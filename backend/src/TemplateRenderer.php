<?php


namespace App;

/**
 * В такой реализации я вижу возможности для гибкого управления шаблонами. Можно будет и аккуратно в хедер подключить,
 * что нибудь, и в футер скрипт какой нибудь. Ну и собственно управлять шаблоном будет удобно.
 * Class TemplateRenderer
 * @package App
 */
class TemplateRenderer
{
//    TODO: описать файл с шаблонами и необходимыми параметрами, там же и алиасы можно описать
    /**
     * TemplateRenderer constructor.
     * @param string $templateName название шаблона
     * @param array $params параметры для шаблона
     */
    public function __construct(string $templateName, array $params)
    {
        // тут мы подгружаем список yaml с шаблонами
        // проверяем, что передано все, что нужно для отрисовки шаблона
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

    private function isParamsValid() : bool
    {

    }

    private function getHeader()
    {

    }

    private function getFooter()
    {

    }

    private function getTemplate()
    {

    }

    private function initTemlate()
    {

    }
}