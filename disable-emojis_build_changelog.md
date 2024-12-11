### 1.1.1
* Release (2024-12-11)
* `ext.php` und `composer.json` max PHP 8.4 gesetzt.
* PHP:
  * Code verwendet jetzt 7.4 Features.
  * Code strikter gestaltet.
* ACP-Template:
  * Aktuelles Makro `select()` von EMP 3.0 übernommen.
  * Aktuelles Makro `footer()` von EMP 3.0 übernommen.
* ACP-Controller:
  * Aktuelle Funktion `select_struct()` von EMP 3.0 übernommen.
  * Aktuelle Funktion `set_meta_template_vars()` von EMP 3.0 übernommen.

### 1.1.0
* Release (2023-12-09)
* Freigegeben für PHP 8.3.
* Erweiterung ist jetzt kompatibel mit Toggle Control. Somit können Administratoren zentral an einer Stelle entscheiden, ob für Ja/Nein Schalter Radio Buttons, Checkboxen oder Toggles verwendet werden sollen.
* ACP-Template:
  * Das `switch()` Makro wurde erweitert, um auch Checkboxen und Radio Buttons generieren zu können. Notwendig für die TC Kompatibilität.
  * Footer durch `footer()` Makro ersetzt.
  * PullDown Menüs durch `select()` Makro ersetzt.
* ACP-Controller:
  * Meine Metadata Funktion eingebaut für das Footer Makro.
* CSS:
  * Das Toggle-CSS in das ACP-CSS integriert und die separate Datei entfernt.
  * Bei Toggles wird jetzt eine Bewegungs-Animation beim Slider verwendet, sowie eine Farb-Animation (Übergang) bei der Hintergrundfarbe. [Vorschlag von Kirk (phpBB.de)]
  * Pointer Cursor bei `dt label` deaktiviert.
* Sprachdateien:
  * An das Footer Makro angepasst.

### 1.0.1
* Release (2023-02-12)

#### 1.0.1-b2
* ACP-Modul:
  * Altes Modul mit manuellem Modus entfernt und neu im automatischen Modus hinzugefügt.
* Neue Migration.

#### 1.0.1-b1
* ACP-Modul:
  * Umgestellt auf Controller.
* ACP-Template:
  * Umbenannt.
  * Twig: `spaceless` Tag entfernt und durch `spaceless` Filter und Whitespace Modifier ersetzt.
  * Toggle Farben von EMP übernommen.
* PHP Mindestversion auf 7.1 erhöht und Maximalversion auf 8.2 erhöht:
  * `composer.json` angepasst.
  * `ext.php` angepasst.

#### 1.0.0
* Release (2023-01-01)
* Updateprüfung eingefügt.
* EC Fehler behoben.
* Kommentarblock in allen Dateien aktualisiert.

#### 1.0.0-b4
* Im CSS fehlte für Responsive ein Abstand für `dd` nach oben, wie es bei LFWWH und EMP gemacht wurde. (Meldung Kirk)
* Kleine Änderungen im ACP-Template
* Sprachdateien:
  * Korrekturen.
  * Sprachvariablen umbenannt.
  * Für die S9E Meldung eigene Sprachdatei angelegt.

#### 1.0.0-b3
* Option "Alles entfernen ohne Hinweis" wieder entfernt. Bereits der Prototyp hatte nicht alles entfernt, sondern immer den Emoji Code stehen lassen. (Vorschlag Kirk)
* Kleine Änderungen in den Sprachdateien.

#### 1.0.0-b2
* Fix: Im Listener war beim Laden der Sprachdatei im Parameter für die Ext ein `\` statt einem `/` notiert. Im lokalen TB funktionierte das trotzdem, darum nicht aufgefallen. (Meldung Kirk)
* Fix: Im ACP-Modul funktionierte Reset nicht, da ich das Template von StatsPerm übernommen hatte und dort der Button anders gehandhabt wird.
* Fix: Im ACP-Modul fehlte das schliessende `fieldset` Tag, wodurch die Buttonleiste innerhalb der Einstellungsgruppe dargestellt wurde, statt ausserhalb.
* Im Kommentarblock war in mehreren Dateien noch der Block von StatsPerm vorhanden.
* Im Nav-Bereich war noch die englische Bezeichnung der Ext vorhanden.
* Kleine Änderungen in den Sprachdateien.

#### 1.0.0-b1
* Initial Git Release.
* Erste Beta
