/**
 * Resolves the locale to use for translations.
 *
 * @param string|null $<?= $localeVariableName; ?> Locale to use for the join condition, e.g. 'fr_FR'
 *
 * @return string
 */
protected function resolveLocale(?string $<?= $localeVariableName; ?> = null): string
{
    if ($<?= $localeVariableName; ?> === null) {
        $<?= $localeVariableName; ?> = $this->get<?= $localeColumnName; ?>();
    }

    if ($<?= $localeVariableName; ?> === null) {
        $<?= $localeVariableName; ?> = PropelL10n::getLocale();
    }

    return $<?= $localeVariableName; ?>;
}

