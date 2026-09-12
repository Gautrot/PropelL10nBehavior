/**
* Sets the locale for translations
*
* @param string|null $locale Locale to use for the translation, e.g. 'fr_FR'
*
* @return $this|<?= $objectClassName ?> The current object (for fluent API support)
*/
public function set<?= $localeColumnName ?>(?string $locale = null)
{
$this->currentLocale = PropelL10n::normalize($locale);

return $this;
}
