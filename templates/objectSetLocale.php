/**
 * Sets the locale for translations
 *
 * @param string $<?= $localeVariableName; ?> Locale to use for the translation, e.g. 'fr_FR'
 *
 * @return $this The current object (for fluent API support)
 */
public function set<?= $localeColumnName; ?>(string $<?= $localeVariableName; ?>): self
{
    $this->currentLocale = PropelL10n::normalize($<?= $localeVariableName; ?>);

    return $this;
}

