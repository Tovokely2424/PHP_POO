<?php
class LayoutForm extends Layout1{
    public function __construct($title, $style, $header, $content, $footer, $js)
    {
        $this->title = $title;
        $this->style = $style;
        $this->header = $this->loadFile('src/View/headerLayoutForm.php');
        $this->content = $content;
        $this->footer = $footer;
        $this->js = $js;
    }

    public function render($titre = ""){
        return("<!DOCTYPE html>
                <html lang=\"en\">
                <head>
                    <meta charset=\"UTF-8\">
                    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
                    <title>{$this->title}</title>
                    {$this->getStyle()}
                </head>
                <body>
                    {$this->header}
                    <div class=\"principale\">
                        <div id=\"conteneur_form\">
                            <div class=\"titre\">
                                <h1>{$titre}</h1>
                            </div>
                            <div class=\"champs\">
                                {$this->content}
                            </div>
                        </div>
                    </div>
                    {$this->footer}
                </body>
                {$this->getJs()}
                </html>
            ");
    }
}
?>