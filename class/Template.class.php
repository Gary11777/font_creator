<?php

declare(strict_types=1);

/**
 * Template class for managing templates, placeholders, labels, and menu points.
 * Provides methods to set and process template data for rendering.
 */
class Template
{
    /**
     * The main template content as a string.
     */
    private $template;
    /**
     * Associative array of placeholder values.
     */
    private $placeholders = array();
    /**
     * Associative array of label values.
     */
    private $labels = array();
    /**
     * Associative array of menu points.
     */
    private $menu_points = array();

    /**
     * The menu template content as a string.
     */
    private $menu_template;

    /**
     * Sets the main template content from a file.
     *
     * @param string $main_template_filename Path to the template file
     * @throws Exception if the file does not exist
     */
    public function setMainTemplate(string $main_template_filename): void
    {
        if (!is_file($main_template_filename)) {
            throw new Exception('Main template [' . $main_template_filename . '] not found.');
        }

        $this->template = file_get_contents($main_template_filename);
    }

    /**
     * Directly replaces a placeholder in the template content.
     *
     * @param string $name Placeholder name to replace
     * @param string $value Value to insert
     */
    public function setPlaceholderDirect(string $name, string $value): void
    {
        $this->template = str_replace($name, $value, $this->template);
    }

    /**
     * Sets a placeholder value for later processing.
     *
     * @param string $name Placeholder name
     * @param string $value Value to assign
     */
    public function setPlaceholder(string $name, string $value): void
    {
        $this->placeholders[$name] = $value;
    }

    /**
     * Sets the array of label values.
     *
     * @param array $labels_array Associative array of labels
     */
    public function setLabels(array $labels_array): void
    {
        $this->labels = $labels_array;
    }

    /**
     * Sets the array of menu points.
     *
     * @param array $menu_points Associative array of menu points
     */
    public function setMenuPoints(array $menu_points): void
    {
        $this->menu_points = $menu_points;
    }

    /**
     * Processes a dynamic value (DV) placeholder.
     *
     * @param array $dv Array containing placeholder info
     * @return string Value of the placeholder
     * @throws Exception if the placeholder is not found
     */
    private function processDV(array $dv): string
    {
        $placeholder_name = $dv[1];
        if (isset($this->placeholders[$placeholder_name])) {
            return $this->placeholders[$placeholder_name];
        } else {
            throw new Exception('Placeholder [' . $placeholder_name . '] not found.');
        }
    }

    /**
     * Processes a label placeholder.
     *
     * @param array $lb Array containing label info
     * @return string Value of the label
     * @throws Exception if the label is not found
     */
    private function processLabels(array $lb): string
    {
        $label_name = $lb[1];
        if (isset($this->labels[$label_name])) {
            return $this->labels[$label_name];
        } else {
            throw new Exception('Label [' . $label_name . '] not found.');
        }
    }

    /**
     * Processes menu points and generates HTML list items for a menu type.
     *
     * @param array $mp Array containing menu type info
     * @return string HTML string of menu items
     * @throws Exception if the menu type is not found
     */
    private function processMenuPoints(array $mp): string
    {
        $type_of_menu = $mp[1];
        if (isset($this->menu_points[$type_of_menu])) {
            $whole_menu = "";
            foreach ($this->menu_points[$type_of_menu] as $link => $menu_name) {
                $whole_menu .= "<li><a href=\"{$link}\">{$menu_name}</a></li>";
            }
            return $whole_menu;
        } else {
            throw new Exception('Menu Point [' . $menu_name . '] not found.');
        }

        /*
        $menu = $mp[1];
        if (isset($this->menu_points)) {
            $whole_menu = "";
            foreach ($this->menu_points as $link => $menu_name) {
                $whole_menu .= "<li><a href=\"{$link}\">{$menu_name}</a></li>";
            }
            return $whole_menu;
        } else {
            throw new Exception('Menu Point [' . $menu_name . '] not found.');
        }
        */
    }

    /**
     * Processes a subtemplate placeholder.
     *
     * @param array $tn Array containing subtemplate info
     * @return string Content of the subtemplate
     * @throws Exception if the subtemplate is not found
     */
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