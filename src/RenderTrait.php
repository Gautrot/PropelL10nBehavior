<?php

namespace Gossi\Propel\Behavior\L10n;

/**
 * # RenderTrait
 */
trait RenderTrait
{

    /**
     * @param $name
     * @param array $vars
     * @return string
     */
    protected function renderTemplate($name, array $vars = []): string
    {
        $this->behavior->backupTemplatesDirname();
        $template = $this->behavior->renderTemplate($name, $vars);
        $this->behavior->restoreTemplatesDirname();
        return $template;
    }
}
