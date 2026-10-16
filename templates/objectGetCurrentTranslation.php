<?php

echo <<<PHP
/**
 * Returns the current translation
 *
 * @param string|null \$$localeVariableName Locale to use for the join condition, e.g. 'fr_FR'
 * @param ConnectionInterface|null \$con an optional connection object
 *
 * @return $i18nTablePhpName
 * @throws PropelException
 */
public function getCurrentTranslation(?string \$$localeVariableName = null, ?ConnectionInterface \$con = null): $i18nTablePhpName
{
    if (\$$localeVariableName === null) {
        \$$localeVariableName = \$this->resolveLocale(\$$localeVariableName);
    }

    return \$this->getTranslation(\$$localeVariableName, \$con);
}


PHP;
