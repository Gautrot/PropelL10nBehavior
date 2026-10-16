<?php

echo <<<PHP
/**
 * Sets the locale for translations.
 * Alias for setLocale(), for BC purpose.
 *
 * @param string \$$localeVariableName Locale to use for the translation, e.g. 'fr_FR'
 *
 * @return \$this The current object (for fluent API support)
 */
public function set$alias(string \$$localeVariableName): self
{
    return \$this->set$localeColumnName(\$$localeVariableName);
}


PHP;
