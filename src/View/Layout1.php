<?php
abstract class Layout1
{
    protected string $title;
    protected array $style = [] ;
    protected array $js = [];
    protected String $header ="";
    protected string $content = "";
    protected string $footer = "";

    //Setters
    public function setTitle($title){
        $this->title = $title;
    }
    public function setStyle($style){
        $this->style = $style;
    }
    public function setJs($js){
        $this->js = $js;
    }
    public function setHeader($header){
        $this->header = $header;
    }
    public function setContent($content){
        $this->content = $content;
    }
    public function setFooter($footer){
        $this->footer = $footer;
    }

    public function addStyle($style){
        $this->style [] =$style;
    }
    public function addJs($js){
        $this->js [] =$js;
    }

    //getter
    public function getTitle(){
        return $this->title ?? "Titre par défaut";
    }
    public function getStyle(){
        $styleR = "";
        foreach($this->style as $style){
            $styleR.=$style;
        }
        return $styleR;
    }
    public function getJs(){
        $jsR = "";
        $jsR = implode('\n', $this->js);
        return $jsR;
    }
    public function getHeader(){
        return $this->header;
    }
    public function getContent(){
        return $this->content;
    }
    public function getFooter(){
        return $this->footer;
    }

    public function loadFile($filePath){
        if (file_exists($filePath)) {
            ob_start();
            include $filePath;
            return ob_get_clean();
        }
        return "";
    }

     

    public function render(){

        $this->style .= $this->addStyle("<link rel=\"stylesheet\" href=\"assets/css/style.css\">");
        
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