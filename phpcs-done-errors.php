FILE: 404.php
--------------------------------------------------------------------------------
FOUND 12 ERRORS AFFECTING 12 LINES
--------------------------------------------------------------------------------
  1 | ERROR | There must be no blank lines before the file comment
    |       | (Squiz.Commenting.FileComment.SpacingAfterOpen)
 26 | ERROR | Global variables defined by a theme/plugin should start with the
    |       | theme/plugin prefix. Found: "$content_elements".
    |       | (WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound)
 31 | ERROR | Global variables defined by a theme/plugin should start with the
    |       | theme/plugin prefix. Found: "$error_image".
    |       | (WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound)
 39 | ERROR | Global variables defined by a theme/plugin should start with the
    |       | theme/plugin prefix. Found: "$content".
    |       | (WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound)
 62 | ERROR | Global variables defined by a theme/plugin should start with the
    |       | theme/plugin prefix. Found: "$btn_type".
    |       | (WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound)
 67 | ERROR | Global variables defined by a theme/plugin should start with the
    |       | theme/plugin prefix. Found: "$read_more_class".
    |       | (WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound)
 68 | ERROR | Inline comments must end in full-stops, exclamation marks, or
    |       | question marks (Squiz.Commenting.InlineComment.InvalidEndChar)
 69 | ERROR | Use Yoda Condition checks, you must.
    |       | (WordPress.PHP.YodaConditions.NotYoda)
 70 | ERROR | Global variables defined by a theme/plugin should start with the
    |       | theme/plugin prefix. Found: "$read_more_class".
    |       | (WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound)
 73 | ERROR | Inline comments must end in full-stops, exclamation marks, or
    |       | question marks (Squiz.Commenting.InlineComment.InvalidEndChar)
 74 | ERROR | Use Yoda Condition checks, you must.
    |       | (WordPress.PHP.YodaConditions.NotYoda)
 75 | ERROR | Global variables defined by a theme/plugin should start with the
    |       | theme/plugin prefix. Found: "$read_more_class".
    |       | (WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound)
--------------------------------------------------------------------------------

FILE: functions.php
--------------------------------------------------------------------------------
FOUND 17 ERRORS AFFECTING 17 LINES
--------------------------------------------------------------------------------
   1 | ERROR | There must be no blank lines before the file comment
     |       | (Squiz.Commenting.FileComment.SpacingAfterOpen)
 118 | ERROR | Inline comments must end in full-stops, exclamation marks, or
     |       | question marks (Squiz.Commenting.InlineComment.InvalidEndChar)
 191 | ERROR | A function call to esc_html__() with texts containing
     |       | placeholders was found, but was not accompanied by a
     |       | "translators:" comment on the line above to clarify the meaning
     |       | of the placeholders.
     |       | (WordPress.WP.I18n.MissingTranslatorsComment)
 210 | ERROR | Inline comments must end in full-stops, exclamation marks, or
     |       | question marks (Squiz.Commenting.InlineComment.InvalidEndChar)
 213 | ERROR | Inline comments must end in full-stops, exclamation marks, or
     |       | question marks (Squiz.Commenting.InlineComment.InvalidEndChar)
 216 | ERROR | Inline comments must end in full-stops, exclamation marks, or
     |       | question marks (Squiz.Commenting.InlineComment.InvalidEndChar)
 219 | ERROR | Inline comments must end in full-stops, exclamation marks, or
     |       | question marks (Squiz.Commenting.InlineComment.InvalidEndChar)
 222 | ERROR | Inline comments must end in full-stops, exclamation marks, or
     |       | question marks (Squiz.Commenting.InlineComment.InvalidEndChar)
 228 | ERROR | Inline comments must end in full-stops, exclamation marks, or
     |       | question marks (Squiz.Commenting.InlineComment.InvalidEndChar)
 232 | ERROR | Inline comments must end in full-stops, exclamation marks, or
     |       | question marks (Squiz.Commenting.InlineComment.InvalidEndChar)
 235 | ERROR | Inline comments must end in full-stops, exclamation marks, or
     |       | question marks (Squiz.Commenting.InlineComment.InvalidEndChar)
 238 | ERROR | Inline comments must end in full-stops, exclamation marks, or
     |       | question marks (Squiz.Commenting.InlineComment.InvalidEndChar)
 241 | ERROR | Inline comments must end in full-stops, exclamation marks, or
     |       | question marks (Squiz.Commenting.InlineComment.InvalidEndChar)
 244 | ERROR | Inline comments must end in full-stops, exclamation marks, or
     |       | question marks (Squiz.Commenting.InlineComment.InvalidEndChar)
 260 | ERROR | Inline comments must end in full-stops, exclamation marks, or
     |       | question marks (Squiz.Commenting.InlineComment.InvalidEndChar)
 270 | ERROR | Missing doc comment for function zenvy_admin_scripts()
     |       | (Squiz.Commenting.FunctionComment.Missing)
 314 | ERROR | Inline comments must end in full-stops, exclamation marks, or
     |       | question marks (Squiz.Commenting.InlineComment.InvalidEndChar)
--------------------------------------------------------------------------------

FILE: inc\back-compat.php
--------------------------------------------------------------------------------
FOUND 6 ERRORS AND 1 WARNING AFFECTING 5 LINES
--------------------------------------------------------------------------------
 34 | ERROR   | A function call to esc_html__() with texts containing
    |         | placeholders was found, but was not accompanied by a
    |         | "translators:" comment on the line above to clarify the meaning
    |         | of the placeholders.
    |         | (WordPress.WP.I18n.MissingTranslatorsComment)
 35 | ERROR   | All output should be run through an escaping function (see the
    |         | Security sections in the WordPress Developer Handbooks), found
    |         | '$message'. (WordPress.Security.EscapeOutput.OutputNotEscaped)
 45 | ERROR   | A function call to esc_html__() with texts containing
    |         | placeholders was found, but was not accompanied by a
    |         | "translators:" comment on the line above to clarify the meaning
    |         | of the placeholders.
    |         | (WordPress.WP.I18n.MissingTranslatorsComment)
 45 | ERROR   | All output should be run through an escaping function (see the
    |         | Security sections in the WordPress Developer Handbooks), found
    |         | '$GLOBALS['wp_version']'.
    |         | (WordPress.Security.EscapeOutput.OutputNotEscaped)
 61 | WARNING | Processing form data without nonce verification.
    |         | (WordPress.Security.NonceVerification.Recommended)
 65 | ERROR   | A function call to esc_html__() with texts containing
    |         | placeholders was found, but was not accompanied by a
    |         | "translators:" comment on the line above to clarify the meaning
    |         | of the placeholders.
    |         | (WordPress.WP.I18n.MissingTranslatorsComment)
 65 | ERROR   | All output should be run through an escaping function (see the
    |         | Security sections in the WordPress Developer Handbooks), found
    |         | '$GLOBALS['wp_version']'.
    |         | (WordPress.Security.EscapeOutput.OutputNotEscaped)
--------------------------------------------------------------------------------

FILE: inc\classes\Zenvy_Breadcrumb.php
--------------------------------------------------------------------------------
FOUND 5 ERRORS AFFECTING 5 LINES
--------------------------------------------------------------------------------
  9 | ERROR | Doc comment short description must start with a capital letter
    |       | (Generic.Commenting.DocComment.ShortNotCapital)
 45 | ERROR | Inline comments must end in full-stops, exclamation marks, or
    |       | question marks (Squiz.Commenting.InlineComment.InvalidEndChar)
 49 | ERROR | Missing doc comment for function get_breadcrumb()
    |       | (Squiz.Commenting.FunctionComment.Missing)
 56 | ERROR | Hook names invoked by a theme/plugin should start with the
    |       | theme/plugin prefix. Found: "breadcrumb_trail_args".
    |       | (WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedHooknameFound)
 58 | ERROR | Hook names invoked by a theme/plugin should start with the
    |       | theme/plugin prefix. Found: "breadcrumb_trail_object".
    |       | (WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedHooknameFound)
--------------------------------------------------------------------------------

FILE: inc\classes\Zenvy_Breadcrumb_Trail.php
--------------------------------------------------------------------------------
FOUND 39 ERRORS AND 1 WARNING AFFECTING 39 LINES
--------------------------------------------------------------------------------
   89 | ERROR   | Parameter comment must end with a full stop
      |         | (Squiz.Commenting.FunctionComment.ParamCommentFullStop)
  125 | ERROR   | Hook names invoked by a theme/plugin should start with the
      |         | theme/plugin prefix. Found: "breadcrumb_trail_args".
      |         | (WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedHooknameFound)
  170 | ERROR   | Inline comments must end in full-stops, exclamation marks, or
      |         | question marks
      |         | (Squiz.Commenting.InlineComment.InvalidEndChar)
  210 | ERROR   | Inline comments must end in full-stops, exclamation marks, or
      |         | question marks
      |         | (Squiz.Commenting.InlineComment.InvalidEndChar)
  214 | ERROR   | Inline comments must end in full-stops, exclamation marks, or
      |         | question marks
      |         | (Squiz.Commenting.InlineComment.InvalidEndChar)
  237 | ERROR   | Hook names invoked by a theme/plugin should start with the
      |         | theme/plugin prefix. Found: "breadcrumb_trail".
      |         | (WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedHooknameFound)
  243 | ERROR   | All output should be run through an escaping function (see
      |         | the Security sections in the WordPress Developer Handbooks),
      |         | found '$breadcrumb'.
      |         | (WordPress.Security.EscapeOutput.OutputNotEscaped)
  282 | ERROR   | Hook names invoked by a theme/plugin should start with the
      |         | theme/plugin prefix. Found: "breadcrumb_trail_labels".
      |         | (WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedHooknameFound)
  302 | ERROR   | Hook names invoked by a theme/plugin should start with the
      |         | theme/plugin prefix. Found: "breadcrumb_trail_post_taxonomy".
      |         | (WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedHooknameFound)
  318 | ERROR   | Expected 1 space after closing brace; newline found
      |         | (Squiz.ControlStructures.ControlSignature.SpaceAfterCloseBrace)
  330 | ERROR   | Expected 1 space after closing brace; newline found
      |         | (Squiz.ControlStructures.ControlSignature.SpaceAfterCloseBrace)
  335 | ERROR   | Expected 1 space after closing brace; newline found
      |         | (Squiz.ControlStructures.ControlSignature.SpaceAfterCloseBrace)
  362 | ERROR   | Expected 1 space after closing brace; newline found
      |         | (Squiz.ControlStructures.ControlSignature.SpaceAfterCloseBrace)
  367 | ERROR   | Expected 1 space after closing brace; newline found
      |         | (Squiz.ControlStructures.ControlSignature.SpaceAfterCloseBrace)
  379 | ERROR   | Hook names invoked by a theme/plugin should start with the
      |         | theme/plugin prefix. Found: "breadcrumb_trail_items".
      |         | (WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedHooknameFound)
  409 | ERROR   | Expected 1 space after closing brace; newline found
      |         | (Squiz.ControlStructures.ControlSignature.SpaceAfterCloseBrace)
  414 | ERROR   | Expected 1 space after closing brace; newline found
      |         | (Squiz.ControlStructures.ControlSignature.SpaceAfterCloseBrace)
  470 | ERROR   | Expected 1 space after closing brace; newline found
      |         | (Squiz.ControlStructures.ControlSignature.SpaceAfterCloseBrace)
  524 | ERROR   | Expected 1 space after closing brace; newline found
      |         | (Squiz.ControlStructures.ControlSignature.SpaceAfterCloseBrace)
  537 | WARNING | Variable assignment found within a condition. Did you mean to
      |         | do a comparison ?
      |         | (Generic.CodeAnalysis.AssignmentInCondition.Found)
  537 | ERROR   | Assignments must be the first block of code on a line
      |         | (Squiz.PHP.DisallowMultipleAssignments.FoundInControlStructure)
  604 | ERROR   | Hook names invoked by a theme/plugin should start with the
      |         | theme/plugin prefix. Found: "post_type_archive_title".
      |         | (WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedHooknameFound)
  637 | ERROR   | Hook names invoked by a theme/plugin should start with the
      |         | theme/plugin prefix. Found: "post_type_archive_title".
      |         | (WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedHooknameFound)
  650 | ERROR   | `get_term_link`'s return type must be checked before calling
      |         | `esc_url` using that value.
      |         | (WordPressVIPMinimum.Functions.CheckReturnValue.DirectFunctionCall)
  951 | ERROR   | Missing parameter comment
      |         | (Squiz.Commenting.FunctionComment.MissingParamComment)
  963 | ERROR   | Use Yoda Condition checks, you must.
      |         | (WordPress.PHP.YodaConditions.NotYoda)
  997 | ERROR   | Missing parameter comment
      |         | (Squiz.Commenting.FunctionComment.MissingParamComment)
 1014 | ERROR   | Expected 1 space after closing brace; newline found
      |         | (Squiz.ControlStructures.ControlSignature.SpaceAfterCloseBrace)
 1037 | ERROR   | Hook names invoked by a theme/plugin should start with the
      |         | theme/plugin prefix. Found: "post_type_archive_title".
      |         | (WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedHooknameFound)
 1055 | ERROR   | Function return type is void, but function contains return
      |         | statement
      |         | (Squiz.Commenting.FunctionComment.InvalidReturnVoid)
 1107 | ERROR   | `get_term_link`'s return type must be checked before calling
      |         | `esc_url` using that value.
      |         | (WordPressVIPMinimum.Functions.CheckReturnValue.DirectFunctionCall)
 1121 | ERROR   | Visibility must be declared on method "add_path_parents"
      |         | (Squiz.Scope.MethodScope.Missing)
 1178 | ERROR   | Visibility must be declared on method "add_term_parents"
      |         | (Squiz.Scope.MethodScope.Missing)
 1190 | ERROR   | `get_term_link`'s return type must be checked before calling
      |         | `esc_url` using that value.
      |         | (WordPressVIPMinimum.Functions.CheckReturnValue.DirectFunctionCall)
 1212 | ERROR   | Superfluous parameter comment
      |         | (Squiz.Commenting.FunctionComment.ExtraParamComment)
 1213 | ERROR   | Function return type is not void, but function has no return
      |         | statement (Squiz.Commenting.FunctionComment.InvalidNoReturn)
 1237 | ERROR   | Expected 1 space after closing brace; newline found
      |         | (Squiz.ControlStructures.ControlSignature.SpaceAfterCloseBrace)
 1242 | ERROR   | Expected 1 space after closing brace; newline found
      |         | (Squiz.ControlStructures.ControlSignature.SpaceAfterCloseBrace)
 1247 | ERROR   | Expected 1 space after closing brace; newline found
      |         | (Squiz.ControlStructures.ControlSignature.SpaceAfterCloseBrace)
 1252 | ERROR   | Expected 1 space after closing brace; newline found
      |         | (Squiz.ControlStructures.ControlSignature.SpaceAfterCloseBrace)
--------------------------------------------------------------------------------

FILE: inc\classes\Zenvy_Font_Awesome_Icons.php
--------------------------------------------------------------------------------
FOUND 2 ERRORS AND 1 WARNING AFFECTING 3 LINES
--------------------------------------------------------------------------------
    1 | ERROR   | Missing file doc comment
      |         | (Squiz.Commenting.FileComment.Missing)
    6 | ERROR   | There must be no blank lines after the class comment
      |         | (Squiz.Commenting.ClassComment.SpacingAfter)
 1532 | WARNING | Not using strict comparison for in_array; supply true for
      |         | $strict argument.
      |         | (WordPress.PHP.StrictInArray.MissingTrueStrict)
--------------------------------------------------------------------------------

FILE: inc\classes\Zenvy_Google_Fonts.php
--------------------------------------------------------------------------------
FOUND 31 ERRORS AFFECTING 30 LINES
--------------------------------------------------------------------------------
   1 | ERROR | Missing file doc comment (Squiz.Commenting.FileComment.Missing)
   2 | ERROR | Missing doc comment for class Zenvy_Google_Fonts
     |       | (Squiz.Commenting.ClassComment.Missing)
  18 | ERROR | Inline comments must end in full-stops, exclamation marks, or
     |       | question marks (Squiz.Commenting.InlineComment.InvalidEndChar)
  21 | ERROR | Inline comments must end in full-stops, exclamation marks, or
     |       | question marks (Squiz.Commenting.InlineComment.InvalidEndChar)
  26 | ERROR | Inline comments must end in full-stops, exclamation marks, or
     |       | question marks (Squiz.Commenting.InlineComment.InvalidEndChar)
  50 | ERROR | Inline comments must end in full-stops, exclamation marks, or
     |       | question marks (Squiz.Commenting.InlineComment.InvalidEndChar)
  84 | ERROR | Inline comments must end in full-stops, exclamation marks, or
     |       | question marks (Squiz.Commenting.InlineComment.InvalidEndChar)
  89 | ERROR | Inline comments must end in full-stops, exclamation marks, or
     |       | question marks (Squiz.Commenting.InlineComment.InvalidEndChar)
  92 | ERROR | Inline comments must end in full-stops, exclamation marks, or
     |       | question marks (Squiz.Commenting.InlineComment.InvalidEndChar)
  98 | ERROR | Inline comments must end in full-stops, exclamation marks, or
     |       | question marks (Squiz.Commenting.InlineComment.InvalidEndChar)
 107 | ERROR | Inline comments must end in full-stops, exclamation marks, or
     |       | question marks (Squiz.Commenting.InlineComment.InvalidEndChar)
 121 | ERROR | Inline comments must end in full-stops, exclamation marks, or
     |       | question marks (Squiz.Commenting.InlineComment.InvalidEndChar)
 398 | ERROR | Inline comments must end in full-stops, exclamation marks, or
     |       | question marks (Squiz.Commenting.InlineComment.InvalidEndChar)
 403 | ERROR | Inline comments must end in full-stops, exclamation marks, or
     |       | question marks (Squiz.Commenting.InlineComment.InvalidEndChar)
 406 | ERROR | Inline comments must end in full-stops, exclamation marks, or
     |       | question marks (Squiz.Commenting.InlineComment.InvalidEndChar)
 412 | ERROR | Inline comments must end in full-stops, exclamation marks, or
     |       | question marks (Squiz.Commenting.InlineComment.InvalidEndChar)
 422 | ERROR | Inline comments must end in full-stops, exclamation marks, or
     |       | question marks (Squiz.Commenting.InlineComment.InvalidEndChar)
 464 | ERROR | Comment closer must be on a new line
     |       | (Squiz.Commenting.BlockComment.CloserSameLine)
 465 | ERROR | Inline comments must end in full-stops, exclamation marks, or
     |       | question marks (Squiz.Commenting.InlineComment.InvalidEndChar)
 474 | ERROR | Inline comments must end in full-stops, exclamation marks, or
     |       | question marks (Squiz.Commenting.InlineComment.InvalidEndChar)
 483 | ERROR | Inline comments must end in full-stops, exclamation marks, or
     |       | question marks (Squiz.Commenting.InlineComment.InvalidEndChar)
 498 | ERROR | Inline comments must end in full-stops, exclamation marks, or
     |       | question marks (Squiz.Commenting.InlineComment.InvalidEndChar)
 506 | ERROR | Inline comments must end in full-stops, exclamation marks, or
     |       | question marks (Squiz.Commenting.InlineComment.InvalidEndChar)
 521 | ERROR | Inline comments must end in full-stops, exclamation marks, or
     |       | question marks (Squiz.Commenting.InlineComment.InvalidEndChar)
 532 | ERROR | Inline comments must end in full-stops, exclamation marks, or
     |       | question marks (Squiz.Commenting.InlineComment.InvalidEndChar)
 540 | ERROR | Inline comments must end in full-stops, exclamation marks, or
     |       | question marks (Squiz.Commenting.InlineComment.InvalidEndChar)
 566 | ERROR | Inline comments must end in full-stops, exclamation marks, or
     |       | question marks (Squiz.Commenting.InlineComment.InvalidEndChar)
 579 | ERROR | Use Yoda Condition checks, you must.
     |       | (WordPress.PHP.YodaConditions.NotYoda)
 600 | ERROR | Missing doc comment for function enqueue_google_fonts()
     |       | (Squiz.Commenting.FunctionComment.Missing)
 618 | ERROR | A file should either contain function declarations or OO
     |       | structure declarations, but not both. Found 1 function
     |       | declaration(s) and 1 OO structure declaration(s). The first
     |       | function declaration was found on line 618; the first OO
     |       | declaration was found on line 2
     |       | (Universal.Files.SeparateFunctionsFromOO.Mixed)
 618 | ERROR | Missing doc comment for function zenvy_google_fonts()
     |       | (Squiz.Commenting.FunctionComment.Missing)
--------------------------------------------------------------------------------