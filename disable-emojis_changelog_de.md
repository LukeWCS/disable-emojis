### 1.1.2
(2026-04-10)

* Fix: Im ACP Modul sollte unterhalb des Titels in der Beschreibung der tatsächliche Erweiterung-Name angezeigt werden, aber durch eine Änderung in 1.1.1 war das nicht mehr gegeben.
* Technik auf den Stand von EMP 3.1 gebracht, Details im Build Changelog.
* Anpassung für Toggle Control 1.3.
* Die Voraussetzungen haben sich geändert:
  * PHP: 8.0.0 - 8.5.x (Bisher: 7.4.0 - 8.4.x)

### 1.1.1
(2024-12-11)

* Die Voraussetzungen haben sich geändert:
  * phpBB: 3.3.0 - 3.3.x (Bisher: 3.2.11 - 3.3.x)
  * PHP: 7.4.0 - 8.4.x (Bisher: 7.1.0 - 8.3.x)
* Technik auf den Stand von EMP 3.0 gebracht, Details im Build Changelog.

### 1.1.0
(2023-12-09)

* Freigegeben für PHP 8.3.
* Erweiterung ist jetzt kompatibel mit Toggle Control. Somit können Administratoren zentral an einer Stelle entscheiden, ob für Ja/Nein Schalter Radio Buttons, Checkboxen oder Toggles verwendet werden sollen.
* Technik auf den Stand von EMP 2.0 gebracht, Details im Build Changelog.

### 1.0.1
(2023-02-12)

* ACP-Template:
  * Toggle Farben von Extension Manager Plus übernommen.
  * Twig: Das `spaceless` Tag, welches seit Twig 2.7 als DEPRECATED eingestuft ist, wurde entfernt. Stattdessen wird `spaceless` Filter und Whitespace Modifier eingesetzt.
* ACP-Modul:
  * Umgestellt auf Controller.
* PHP Minimalversion auf 7.1 erhöht und Maximalversion auf 8.2.

### 1.0.0
(2023-01-01)

* Erste öffentliche Version.
