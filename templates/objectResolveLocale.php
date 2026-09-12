/**
 * Resolves the locale to use for translations.
 *
 * @param string|null $locale Locale to use for the join condition, e.g. 'fr_FR'
 *
 * @return string
 */
protected function resolveLocale(?string $locale = null): string
{
    if ($locale === null) {
        $locale = $this->get<?= $localeColumnName; ?>();
    }
    if ($locale === null) {
        $locale = PropelL10n::getLocale();
    }

    return $locale;
}

