/**
 * Remove the translation for a given locale
 *
 * @param string|null $<?= $localeVariableName; ?> Locale to use for the translation, e.g. 'fr_FR'
 * @param ConnectionInterface|null $con an optional connection object
 *
 * @return $this|<?= $objectClassName; ?> The current object (for fluent API support)
 * @throws PropelException
 */
public function removeTranslation(?string $<?= $localeVariableName; ?> = null, ?ConnectionInterface $con = null)
{
    if ($<?= $localeVariableName; ?> === null) {
        $<?= $localeVariableName; ?> = $this->resolveLocale($<?= $localeVariableName; ?>);
    }

    if (!$this->isNew()) {
        <?= $i18nQueryName; ?>::create()
            ->filterByPrimaryKey([$this->getPrimaryKey(), $<?= $localeVariableName; ?>])
            ->delete($con);
    }

    if (isset($this->currentTranslations[$<?= $localeVariableName; ?>])) {
        unset($this->currentTranslations[$<?= $localeVariableName; ?>]);
    }

    foreach ($this-><?= $i18nCollection; ?> as $key => $translation) {
        if ($translation->get<?= $localeColumnName; ?>() === $<?= $localeVariableName; ?>) {
            unset($this-><?= $i18nCollection; ?>[$key]);
            break;
        }
    }

    return $this;
}

