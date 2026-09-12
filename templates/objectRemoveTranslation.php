/**
 * Remove the translation for a given locale
 *
 * @param string|null $locale Locale to use for the translation, e.g. 'fr_FR'
 * @param ConnectionInterface|null $con an optional connection object
 *
 * @return $this|<?= $objectClassName; ?> The current object (for fluent API support)
 * @throws PropelException
 */
public function removeTranslation(?string $locale = null, ?ConnectionInterface $con = null)
{
    $locale = $this->resolveLocale($locale);

    if (!$this->isNew()) {
        <?= $i18nQueryName; ?>::create()
            ->filterByPrimaryKey(array($this->getPrimaryKey(), $locale))
            ->delete($con);
    }
    if (isset($this->currentTranslations[$locale])) {
        unset($this->currentTranslations[$locale]);
    }
    foreach ($this-><?= $i18nCollection; ?> as $key => $translation) {
        if ($translation->get<?= $localeColumnName; ?>() === $locale) {
            unset($this-><?= $i18nCollection; ?>[$key]);
            break;
        }
    }

    return $this;
}

