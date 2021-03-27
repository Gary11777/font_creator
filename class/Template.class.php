<?php

declare(strict_types=1);

class Template
{
    private $template;
    private $placeholders = array();
    private $labels = array();
    private $menu_points = array();
    private $menu_template;

    public function setMainTemplate(string
                                    $main_template_filename):
    void
    {
        if (!is_file($main_template_filename)) {
            throw new Exception('Main template [' .
                $main_template_filename . '] not found.');
        }

        $this->template = file_get_contents
        ($main_template_filename);
    }

    public function setPlaceholderDirect(string $name, string
    $value): void
    {
        $this->template = str_replace($name, $value,
            $this->template);
    }

    public function setPlaceholder(string $name, string
    $value): void
    {
        $this->placeholders[$name] = $value;
    }

    public function setLabels(array $labels_array): void
    {
        $this->labels = $labels_array;
    }

    public function setMenuPoints(array $menu_points): void
    {
        $this->menu_points = $menu_points;
    }

    private function processDV(array $dv): string
    {
        $placeholder_name = $dv[1];
        if (isset($this->placeholders[$placeholder_name])) {
            return $this->placeholders[$placeholder_name];
        } else {
            throw new Exception('Placeholder ['
                . $placeholder_name
                . '] not found.');
        }
    }

    private function processLabels(array $lb): string
    {
        $label_name = $lb[1];
        if (isset($this->labels[$label_name])) {
            return $this->labels[$label_name];
        } else {
            throw new Exception('Label [' .
                $label_name . '] not found.');
        }
    }

    private function processMenuPoints(array $mp): string
    {
        $type_of_menu = $mp[1];
        if (isset($this->menu_points[$type_of_menu])) {
            $whole_menu = "";
            foreach ($this->menu_points[$type_of_menu] as
                     $link => $menu_name) {
                $whole_menu .= "<li><a 
                href=\"{$link}\">{$menu_name}</a></li>";
            }
            return $whole_menu;
        } else {
            throw new Exception('Menu Point [' .
                $menu_name . '] not found.');
        }

        /*
        $menu = $mp[1];
        if (isset($this->menu_points)) {
            $whole_menu = "";
            foreach ($this->menu_points as $link =>
                     $menu_name) {
                $whole_menu .= "<li><a 
                href=\"{$link}\">{$menu_name}</a></li>";
            }
            return $whole_menu;
        } else {
            throw new Exception('Menu Point [' .
                $menu_name . '] not found.');
        }
        */
    }

    private function processSubtemplates(array $tn): string
    {
        $subtemplate_name = 'templates/' . $tn[1];
        if (is_file($subtemplate_name)) {
            return file_get_contents($subtemplate_name);
        } else {
            throw new Exception('Subtemplate [' .
                $subtemplate_name . '] not found.');
        }
    }

    public function processTemplate(): void
    {
        while (preg_match("/{FILE=\"(.*)\"}|{DV=\"(.*)\"}|{LABEL=\"(.*)\"}|{MENU_POINT=\"(.*)\"}/Ui",
            $this->template)) {
            $this->template = preg_replace_callback(
                "/{DV=\"(.*)\"}/Ui",
                array($this, 'processDV'),
                $this->template
            );
            $this->template = preg_replace_callback(
                "/{LABEL=\"(.*)\"}/Ui",
                array($this, 'processLabels'),
                $this->template
            );
            $this->template = preg_replace_callback(
                "/{FILE=\"(.*)\"}/Ui",
                array($this, 'processSubtemplates'),
                $this->template
            );
            $this->template = preg_replace_callback(
                "/{MENU_POINT=\"(.*)\"}/Ui",
                array($this, 'processMenuPoints'),
                $this->template
            );

        }
    }

    public function getFinalPage(bool $remove_comments = true, bool $compress = true): string
    {
        $temp = $this->template;
        if ($remove_comments == true) {
            $temp = preg_replace("/<!--.*-->/sU", "", $temp);
        }

        // TODO: Maybe change to regexes?
        if ($compress == true) {
            while (strpos($temp, '  ') !== false) {
                $temp = str_replace('  ', ' ', $temp);
            }

            while (strpos($temp, "\r\r") !== false) {
                $temp = str_replace("\r\r", "\r", $temp);
            }

            while (strpos($temp, "\n\n") !== false) {
                $temp = str_replace("\n\n", "\n", $temp);
            }

            while (strpos($temp, "\r\n\r\n") !== false) {
                $temp = str_replace("\r\n\r\n", "\r\n", $temp);
            }
        }

        return $temp;
    }

}