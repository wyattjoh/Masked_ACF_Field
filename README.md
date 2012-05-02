Masked ACF Field
================
## Installation
Just upload the `masked-field.php` file into your theme folder in a subfolder called `acf-fields`. Upload the maked_input.js file into the same folder, subfolder `assests`.

To enable use of the field, simply include the following in your `functions.php` file from your theme.

```php
  	if(function_exists('register_field')) {
			register_field('Masked_field', dirname(__FILE__) . '/acf-fields/masked-field.php');
		}
```

## Usage
To use the field, select the field `Maked Field` in ACF when creating the field group. In the fomatting field, specify the following to define your style:

* a - Represents an alpha character (A-Z,a-z)
* 9 - Represents a numeric character (0-9)
* \* - Represents an alphanumeric character (A-Z,a-z,0-9)

In any combination that you want to mask. For example:
```php
(999) 999-9999 <- Phone Number
a9a-9a9 <- Postal Code
```

## Examples
Inputting `(999) 999-9999` will result in input such as `A-Z` to be disallowed in the field. Additionally, it will enforce the mask:
```php
(___) ___-____
```
Which will be saved to the database. It will then when called return the full masked value: `(###) ###-####`. Where `#` represents a number entered into the field.

## Testing

This has been tested fully with the Advanced Custom Fields Plugin (v3.1.8) and jQuery included in Wordpress (v3.3.2). 
None of this would have been possible without the Masked Input Plugin for jQuery Plugin by Josh Bush (v1.3) 
over at digitalbush.com.

## Comments/Issues

If you have any questions, please let me know via my contact form on http://www.wyattjohnson.ca/. Or if That doesnt work, because Wordpress is not infallible, by email wyatt [at] wyattjohnson.ca.

Any Issues can be submitted via the Github page https://github.com/Wyattjoh/Masked_ACF_Field/. Or of course if you have anything to add just send me a pull request.
## Copyright

Copyright (c) 2012-2013 Wyatt Johnson (wyattjohnson.ca)
Licensed under the MIT license

Permission is hereby granted, free of charge, to any person
obtaining a copy of this software and associated documentation
files (the "Software"), to deal in the Software without
restriction, including without limitation the rights to use,
copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the
Software is furnished to do so, subject to the following
conditions:

The above copyright notice and this permission notice shall be
included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES
OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT
HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY,
WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR
OTHER DEALINGS IN THE SOFTWARE.