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

    private $pageContent;

    /**
     * @var \DOMDocument
     */
    private $pageDOM;

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
        if ((bool)$this->templateParams && $this->isParamsValid($params)) {
            foreach ($this->templateParams as $key => $valueFromConfig) {
                $this->templateParams[$key] = $params[$key] ? $params[$key] : $valueFromConfig;
            }
        };
    }

    /**
     * @return string html-код, стандартный вывод
     */
    public function render()
    {
        // todo: может статься так, что переменные шаблона будут относиться и к хедеру и к футеру, мб правильнее будет заполнять переменные ВСЕЙ страницы в initTemplate
        // todo: переименовать initTemplate чем то более подходящим под "заполнить переменные шаблона значениями"
        ob_start();
        $this->getHeader();
        $this->getTemplate();
        $this->getFooter();
        $this->pageContent = ob_get_contents();
        ob_end_clean();

        $this->pageDOM = new \DOMDocument();
        $this->pageDOM->loadHTML($this->pageContent);

        $this->replaceVariableStubs();

        echo $this->pageContent;
    }

    /**
     * @param array $params Параметры переданные в конструктор объекта TemplateRenderer
     * @return bool Валидность/не валидность параметров
     * @throws \Exception Если один из параметров шаблона остался без значения - бросаю исключение
     */
    private function isParamsValid(array $params): bool
    {
        if (!$this->templateParams) return true;

        foreach($this->templateParams as $key => $valueFromConfig) {
            if(!$params[$key] && !$valueFromConfig) {
                // Бросать исключение или все же возвращать bool? С одной стороны - исключение информативнее, с другой - выбивается из логики функции. Для нее штатна проверка
                // и следовательно логичнее вернуть FALSE и все.
                throw new \Exception("Не передан параметр с ключом $key шаблона $this->templateName", 415);
            }
        }

        return true;
    }

    private function getHeader()
    {
        include getenv('PROJECT_DIR') . self::DEFAULT_TEMPLATE_DIR . 'header.php';
    }

    private function getFooter()
    {
        include getenv('PROJECT_DIR') . self::DEFAULT_TEMPLATE_DIR . 'footer.php';
    }

    private function getTemplate()
    {
        include getenv('PROJECT_DIR') . $this->templateFilepath;
    }

    /**
     * Заменяет параметры вида {{paramName}} на значение соотв-го ключа paramName
     */
    private function replaceVariableStubs()
    {
        if (!$this->templateParams) return true;

        foreach($this->templateParams as $paramName => $value) {
            // Пока использую str_replace как самый быстрый. Если постоянно будет проблема рода
            // {{title}, {{ title }}, {{ title}} - придется перейти на preg_replace. Или не косячить хд
            $this->pageContent = str_replace('{{'. $paramName . '}}', $value, $this->pageContent);
        }
    }
}