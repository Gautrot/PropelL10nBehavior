/**
 * Sets the locale for translations
 *
 * @param string $locale Locale to use for the translation, e.g. 'fr_FR'
 *
 * @return $this The current object (for fluent API support)
 */
public function set<?= $localeColumnName; ?>(string $locale): self
{
    $this->currentLocale = PropelL10n::normalize($locale);

    return $this;
}

