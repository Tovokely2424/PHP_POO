<?php
    final class Layout extends Layout1
    {
        public function __construct($title, $style, $headerFile, $content, $footer, $js){
            $this->title = $title;
            $this->style = $style;
            $this->header = $this->loadFile($headerFile);;
            $this->content = $content;
            $this->footer = $footer;
            $this->js = $js;
        }

        public function render(){

            $this->style [] = $this->addStyle("<link rel=\"stylesheet\" href=\"assets/css/style.css\">");
            
            return"
                <!DOCTYPE html>
                <html lang=\"en\">
                <head>
                    <meta charset=\"UTF-8\">
                    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
                    <title>{$this->getTitle()}</title>
                    {$this->getStyle()}
                </head>
                <body>
                    <div class=\"container\">
                        {$this->getHeader()}
                        <section class=\"principale\">
                            {$this->getContent()}
                        </section>
                        <footer>
                            {$this->getFooter()}
                        </footer>
                    </div>
                    
                </body>
                <sript>{$this->getJs()}</>
                </html>";
        }
    }
    
?>