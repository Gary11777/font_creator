<?php

declare(strict_types=1);

class Template
{
    private $template;
    private $placeholders = array();
    private $labels = array();

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
        while (preg_match("/{FILE=\"(.*)\"}|{DV=\"(.*)\"}|{LABEL=\"(.*)\"}/Ui",
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