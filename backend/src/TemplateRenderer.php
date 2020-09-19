<?php


namespace App;

use Symfony\Component\Yaml\Yaml;

/**
 * В такой реализации я вижу возможности для гибкого управления шаблонами. Можно будет и аккуратно в хедер подключить,
 * что нибудь, и в футер скрипт какой нибудь. Ну и собственно управлять шаблоном будет удобно.
 * Class TemplateRenderer
 * @package App
 */
class TemplateRenderer
{
    const DEFAULT_TEMPLATE_DIR = '/templates/';
    const DEFAULT_CONFIG_FILEPATH = '/config/templates.yaml';

    private $templateFilepath;

    private $templateParams;

    private $templateName;

//    TODO: описать файл с шаблонами и необходимыми параметрами, там же и алиасы можно описать
    /**
     * TemplateRenderer constructor.
     * @param string $templateName название шаблона
     * @param array $params параметры для шаблона
     */
    public function __construct(string $templateName, array $params)
    {
        $templateConfigList = Yaml::parseFile(getenv('PROJECT_DIR') . self::DEFAULT_CONFIG_FILEPATH);
        $currentTemplateConfig = $templateConfigList[$templateName];
        if(!$currentTemplateConfig) {
            throw new \Exception('Передано неизвестное имя шаблона, проверь передаваемое название шаблона или 
            файл config/templates.yaml', 500);
        }

        $this->templateName = $templateName;
        $this->templateFilepath = $currentTemplateConfig['path'] ?? self::DEFAULT_TEMPLATE_DIR . $templateName . "/template.php";
        $this->templateParams = $currentTemplateConfig['params'];

        // проверяем, что переданы нужные параметры для отрисовки шаблона
        if($this->isParamsValid($params)) {
            foreach ($this->templateParams as $key => $valueFromConfig) {
                $this->templateParams[$key] = $params[$key] ? $params[$key] : $valueFromConfig;
            }
        };
    }

    /**
     * @return string html-код, стандартный вывод
     */
    public function render() : string
    {
        // подключить header
        // загрузить нужный шаблон
        // заменить заглушки на значения переменных
        // подключить футер
    }

    /**
     * @param array $params Параметры переданные в конструктор объекта TemplateRenderer
     * @return bool Валидность/не валидность параметров
     * @throws \Exception Если один из параметров шаблона остался без значения - бросаю исключение
     */
    private function isParamsValid(array $params): bool
    {
        foreach($this->templateParams as $key => $valueFromConfig) {
            if(!$params[$key] && !$valueFromConfig) {
                // Бросать исключение или все же возвращать bool? С одной стороны - исключение информативнее, с другой - выбивается из логики функции. Для нее штатна проверка
                // и следовательно логичнее вернуть FALSE и все.
                throw new \Exception("Не передан параметр с ключом $key шаблона $this->templateName", 415);
            }
        }

        return true;
    }

    /**
     * @return string содержимое файла /templates/header.php
     * @throws \Exception Если файл не найден
     */
    private function getHeader() : string
    {
        $headerFilepath = getenv('PROJECT_DIR') . self::DEFAULT_TEMPLATE_DIR . 'header.php';
        $header = file_get_contents($headerFilepath);
        if(!$header) {
            throw new \Exception('Не найден файл хедера, проверь ' . $headerFilepath, 404);
        }

        return $header;
    }

    /**
     * @return string содержимое файла /templates/footer.php
     * @throws \Exception Если файл не найден
     */
    private function getFooter() : string
    {
        $footerFilepath = getenv('PROJECT_DIR') . self::DEFAULT_TEMPLATE_DIR . 'footer.php';
        $footer = file_get_contents($footerFilepath);
        if(!$footer) {
            throw new \Exception('Не найден файл футера, проверь ' . $footerFilepath, 404);
        }

        return $footer;
    }

    private function getTemplate()
    {

    }

    private function initTemlate()
    {

    }
}