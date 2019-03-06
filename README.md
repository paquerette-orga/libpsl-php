# libpsl-php
Library to integrate PSL test in PHP

# How to use it ?

- Clone the repo or download one of the releases available : `git clone https://github.com/frju365/libpsl-php.git`
- Include the `psl-inspector.php` file in your file. Add at the top of your file for example : `require("libpsl-php/psl-inspector.php");`
- Use class CheckTLD() like I did in `test/test1` and others

# Why I can use it ?

You can have multiple usages : 
- Check a mail adress (just replace host by the adress you want to check)
- Check is the TLD of a host is a TLD.
- Check if a host has a PSL prefix

# Version

0.1Beta

# Credit and license

Libpsl has the goal to provide an integration library for PSL in
PHP.

Copyright (C) 2019  Gomes Dias Julien

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <https://www.gnu.org/licenses/>.
See LICENSE file for more informations.
