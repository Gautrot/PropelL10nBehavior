/**
* Gets the locale for translations
*
* @return string|null $locale Locale to use for the translation, e.g. 'fr_FR'
*/
public function get<?= $localeColumnName ?>(): ?string
{
return $this->currentLocale;
}
