<?php 
include("include/functions.php");


?>


<?php

if(isset($_GET['std'])){

   $std_index = $_GET['std'];

   $stud_index = Stud_Index($std_index);

   $student_profile_common = student_profile_common_sql($std_index);
   $current_sem = $student_profile_common['curr_sem'];
   $stud_transcript_sql = stud_transcript_sql($std_index, $current_sem);
   $total_hours = Total_Hours($std_index);
   stud_course_mark_sql($std_index);

  //  $get_date = Get_Date($std_cert_id);
}
?>





<html xmlns:v="urn:schemas-microsoft-com:vml"
xmlns:o="urn:schemas-microsoft-com:office:office"
xmlns:w="urn:schemas-microsoft-com:office:word"
xmlns:m="http://schemas.microsoft.com/office/2004/12/omml"
xmlns="http://www.w3.org/TR/REC-html40">

<head>
<meta http-equiv=Content-Type content="text/html; charset=windows-1252">
<meta name=ProgId content=Word.Document>
<meta name=Generator content="Microsoft Word 15">
<meta name=Originator content="Microsoft Word 15">
<link rel=File-List
href="Master%20of%20Computer%20Science%20(1)_files/filelist.xml">
<!--[if gte mso 9]><xml>
 <o:DocumentProperties>
  <o:Author>LENOVO</o:Author>
  <o:LastAuthor>Ghazi Abdull Omer</o:LastAuthor>
  <o:Revision>2</o:Revision>
  <o:TotalTime>127</o:TotalTime>
  <o:LastPrinted>2024-08-31T11:03:00Z</o:LastPrinted>
  <o:Created>2024-09-15T09:24:00Z</o:Created>
  <o:LastSaved>2024-09-15T09:24:00Z</o:LastSaved>
  <o:Pages>1</o:Pages>
  <o:Words>310</o:Words>
  <o:Characters>1768</o:Characters>
  <o:Lines>14</o:Lines>
  <o:Paragraphs>4</o:Paragraphs>
  <o:CharactersWithSpaces>2074</o:CharactersWithSpaces>
  <o:Version>16.00</o:Version>
 </o:DocumentProperties>
 <o:OfficeDocumentSettings>
  <o:AllowPNG/>
 </o:OfficeDocumentSettings>
</xml><![endif]-->
<link rel=themeData
href="Master%20of%20Computer%20Science%20(1)_files/themedata.thmx">
<link rel=colorSchemeMapping
href="Master%20of%20Computer%20Science%20(1)_files/colorschememapping.xml">
<!--[if gte mso 9]><xml>
 <w:WordDocument>
  <w:SpellingState>Clean</w:SpellingState>
  <w:GrammarState>Clean</w:GrammarState>
  <w:TrackMoves>false</w:TrackMoves>
  <w:TrackFormatting/>
  <w:PunctuationKerning/>
  <w:ValidateAgainstSchemas/>
  <w:SaveIfXMLInvalid>false</w:SaveIfXMLInvalid>
  <w:IgnoreMixedContent>false</w:IgnoreMixedContent>
  <w:AlwaysShowPlaceholderText>false</w:AlwaysShowPlaceholderText>
  <w:DoNotPromoteQF/>
  <w:LidThemeOther>EN-US</w:LidThemeOther>
  <w:LidThemeAsian>X-NONE</w:LidThemeAsian>
  <w:LidThemeComplexScript>AR-SA</w:LidThemeComplexScript>
  <w:Compatibility>
   <w:BreakWrappedTables/>
   <w:SnapToGridInCell/>
   <w:WrapTextWithPunct/>
   <w:UseAsianBreakRules/>
   <w:DontGrowAutofit/>
   <w:SplitPgBreakAndParaMark/>
   <w:EnableOpenTypeKerning/>
   <w:DontFlipMirrorIndents/>
   <w:OverrideTableStyleHps/>
  </w:Compatibility>
  <m:mathPr>
   <m:mathFont m:val="Cambria Math"/>
   <m:brkBin m:val="before"/>
   <m:brkBinSub m:val="&#45;-"/>
   <m:smallFrac m:val="off"/>
   <m:dispDef/>
   <m:lMargin m:val="0"/>
   <m:rMargin m:val="0"/>
   <m:defJc m:val="centerGroup"/>
   <m:wrapIndent m:val="1440"/>
   <m:intLim m:val="subSup"/>
   <m:naryLim m:val="undOvr"/>
  </m:mathPr></w:WordDocument>
</xml><![endif]--><!--[if gte mso 9]><xml>
 <w:LatentStyles DefLockedState="false" DefUnhideWhenUsed="false"
  DefSemiHidden="false" DefQFormat="false" DefPriority="99"
  LatentStyleCount="376">
  <w:LsdException Locked="false" Priority="0" QFormat="true" Name="Normal"/>
  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 1"/>
  <w:LsdException Locked="false" Priority="9" SemiHidden="true"
   UnhideWhenUsed="true" QFormat="true" Name="heading 2"/>
  <w:LsdException Locked="false" Priority="9" SemiHidden="true"
   UnhideWhenUsed="true" QFormat="true" Name="heading 3"/>
  <w:LsdException Locked="false" Priority="9" SemiHidden="true"
   UnhideWhenUsed="true" QFormat="true" Name="heading 4"/>
  <w:LsdException Locked="false" Priority="9" SemiHidden="true"
   UnhideWhenUsed="true" QFormat="true" Name="heading 5"/>
  <w:LsdException Locked="false" Priority="9" SemiHidden="true"
   UnhideWhenUsed="true" QFormat="true" Name="heading 6"/>
  <w:LsdException Locked="false" Priority="9" SemiHidden="true"
   UnhideWhenUsed="true" QFormat="true" Name="heading 7"/>
  <w:LsdException Locked="false" Priority="9" SemiHidden="true"
   UnhideWhenUsed="true" QFormat="true" Name="heading 8"/>
  <w:LsdException Locked="false" Priority="9" SemiHidden="true"
   UnhideWhenUsed="true" QFormat="true" Name="heading 9"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="index 1"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="index 2"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="index 3"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="index 4"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="index 5"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="index 6"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="index 7"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="index 8"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="index 9"/>
  <w:LsdException Locked="false" Priority="39" SemiHidden="true"
   UnhideWhenUsed="true" Name="toc 1"/>
  <w:LsdException Locked="false" Priority="39" SemiHidden="true"
   UnhideWhenUsed="true" Name="toc 2"/>
  <w:LsdException Locked="false" Priority="39" SemiHidden="true"
   UnhideWhenUsed="true" Name="toc 3"/>
  <w:LsdException Locked="false" Priority="39" SemiHidden="true"
   UnhideWhenUsed="true" Name="toc 4"/>
  <w:LsdException Locked="false" Priority="39" SemiHidden="true"
   UnhideWhenUsed="true" Name="toc 5"/>
  <w:LsdException Locked="false" Priority="39" SemiHidden="true"
   UnhideWhenUsed="true" Name="toc 6"/>
  <w:LsdException Locked="false" Priority="39" SemiHidden="true"
   UnhideWhenUsed="true" Name="toc 7"/>
  <w:LsdException Locked="false" Priority="39" SemiHidden="true"
   UnhideWhenUsed="true" Name="toc 8"/>
  <w:LsdException Locked="false" Priority="39" SemiHidden="true"
   UnhideWhenUsed="true" Name="toc 9"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Normal Indent"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="footnote text"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="annotation text"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="header"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="footer"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="index heading"/>
  <w:LsdException Locked="false" Priority="35" SemiHidden="true"
   UnhideWhenUsed="true" QFormat="true" Name="caption"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="table of figures"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="envelope address"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="envelope return"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="footnote reference"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="annotation reference"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="line number"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="page number"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="endnote reference"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="endnote text"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="table of authorities"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="macro"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="toa heading"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List Bullet"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List Number"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List 2"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List 3"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List 4"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List 5"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List Bullet 2"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List Bullet 3"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List Bullet 4"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List Bullet 5"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List Number 2"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List Number 3"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List Number 4"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List Number 5"/>
  <w:LsdException Locked="false" Priority="10" QFormat="true" Name="Title"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Closing"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Signature"/>
  <w:LsdException Locked="false" Priority="1" SemiHidden="true"
   UnhideWhenUsed="true" Name="Default Paragraph Font"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Body Text"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Body Text Indent"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List Continue"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List Continue 2"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List Continue 3"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List Continue 4"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List Continue 5"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Message Header"/>
  <w:LsdException Locked="false" Priority="11" QFormat="true" Name="Subtitle"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Salutation"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Date"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Body Text First Indent"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Body Text First Indent 2"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Note Heading"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Body Text 2"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Body Text 3"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Body Text Indent 2"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Body Text Indent 3"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Block Text"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Hyperlink"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="FollowedHyperlink"/>
  <w:LsdException Locked="false" Priority="22" QFormat="true" Name="Strong"/>
  <w:LsdException Locked="false" Priority="20" QFormat="true" Name="Emphasis"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Document Map"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Plain Text"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="E-mail Signature"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="HTML Top of Form"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="HTML Bottom of Form"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Normal (Web)"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="HTML Acronym"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="HTML Address"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="HTML Cite"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="HTML Code"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="HTML Definition"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="HTML Keyboard"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="HTML Preformatted"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="HTML Sample"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="HTML Typewriter"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="HTML Variable"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Normal Table"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="annotation subject"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="No List"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Outline List 1"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Outline List 2"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Outline List 3"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Simple 1"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Simple 2"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Simple 3"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Classic 1"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Classic 2"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Classic 3"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Classic 4"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Colorful 1"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Colorful 2"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Colorful 3"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Columns 1"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Columns 2"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Columns 3"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Columns 4"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Columns 5"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Grid 1"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Grid 2"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Grid 3"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Grid 4"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Grid 5"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Grid 6"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Grid 7"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Grid 8"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table List 1"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table List 2"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table List 3"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table List 4"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table List 5"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table List 6"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table List 7"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table List 8"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table 3D effects 1"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table 3D effects 2"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table 3D effects 3"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Contemporary"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Elegant"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Professional"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Subtle 1"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Subtle 2"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Web 1"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Web 2"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Web 3"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Balloon Text"/>
  <w:LsdException Locked="false" Priority="39" Name="Table Grid"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Theme"/>
  <w:LsdException Locked="false" SemiHidden="true" Name="Placeholder Text"/>
  <w:LsdException Locked="false" Priority="1" QFormat="true" Name="No Spacing"/>
  <w:LsdException Locked="false" Priority="60" Name="Light Shading"/>
  <w:LsdException Locked="false" Priority="61" Name="Light List"/>
  <w:LsdException Locked="false" Priority="62" Name="Light Grid"/>
  <w:LsdException Locked="false" Priority="63" Name="Medium Shading 1"/>
  <w:LsdException Locked="false" Priority="64" Name="Medium Shading 2"/>
  <w:LsdException Locked="false" Priority="65" Name="Medium List 1"/>
  <w:LsdException Locked="false" Priority="66" Name="Medium List 2"/>
  <w:LsdException Locked="false" Priority="67" Name="Medium Grid 1"/>
  <w:LsdException Locked="false" Priority="68" Name="Medium Grid 2"/>
  <w:LsdException Locked="false" Priority="69" Name="Medium Grid 3"/>
  <w:LsdException Locked="false" Priority="70" Name="Dark List"/>
  <w:LsdException Locked="false" Priority="71" Name="Colorful Shading"/>
  <w:LsdException Locked="false" Priority="72" Name="Colorful List"/>
  <w:LsdException Locked="false" Priority="73" Name="Colorful Grid"/>
  <w:LsdException Locked="false" Priority="60" Name="Light Shading Accent 1"/>
  <w:LsdException Locked="false" Priority="61" Name="Light List Accent 1"/>
  <w:LsdException Locked="false" Priority="62" Name="Light Grid Accent 1"/>
  <w:LsdException Locked="false" Priority="63" Name="Medium Shading 1 Accent 1"/>
  <w:LsdException Locked="false" Priority="64" Name="Medium Shading 2 Accent 1"/>
  <w:LsdException Locked="false" Priority="65" Name="Medium List 1 Accent 1"/>
  <w:LsdException Locked="false" SemiHidden="true" Name="Revision"/>
  <w:LsdException Locked="false" Priority="34" QFormat="true"
   Name="List Paragraph"/>
  <w:LsdException Locked="false" Priority="29" QFormat="true" Name="Quote"/>
  <w:LsdException Locked="false" Priority="30" QFormat="true"
   Name="Intense Quote"/>
  <w:LsdException Locked="false" Priority="66" Name="Medium List 2 Accent 1"/>
  <w:LsdException Locked="false" Priority="67" Name="Medium Grid 1 Accent 1"/>
  <w:LsdException Locked="false" Priority="68" Name="Medium Grid 2 Accent 1"/>
  <w:LsdException Locked="false" Priority="69" Name="Medium Grid 3 Accent 1"/>
  <w:LsdException Locked="false" Priority="70" Name="Dark List Accent 1"/>
  <w:LsdException Locked="false" Priority="71" Name="Colorful Shading Accent 1"/>
  <w:LsdException Locked="false" Priority="72" Name="Colorful List Accent 1"/>
  <w:LsdException Locked="false" Priority="73" Name="Colorful Grid Accent 1"/>
  <w:LsdException Locked="false" Priority="60" Name="Light Shading Accent 2"/>
  <w:LsdException Locked="false" Priority="61" Name="Light List Accent 2"/>
  <w:LsdException Locked="false" Priority="62" Name="Light Grid Accent 2"/>
  <w:LsdException Locked="false" Priority="63" Name="Medium Shading 1 Accent 2"/>
  <w:LsdException Locked="false" Priority="64" Name="Medium Shading 2 Accent 2"/>
  <w:LsdException Locked="false" Priority="65" Name="Medium List 1 Accent 2"/>
  <w:LsdException Locked="false" Priority="66" Name="Medium List 2 Accent 2"/>
  <w:LsdException Locked="false" Priority="67" Name="Medium Grid 1 Accent 2"/>
  <w:LsdException Locked="false" Priority="68" Name="Medium Grid 2 Accent 2"/>
  <w:LsdException Locked="false" Priority="69" Name="Medium Grid 3 Accent 2"/>
  <w:LsdException Locked="false" Priority="70" Name="Dark List Accent 2"/>
  <w:LsdException Locked="false" Priority="71" Name="Colorful Shading Accent 2"/>
  <w:LsdException Locked="false" Priority="72" Name="Colorful List Accent 2"/>
  <w:LsdException Locked="false" Priority="73" Name="Colorful Grid Accent 2"/>
  <w:LsdException Locked="false" Priority="60" Name="Light Shading Accent 3"/>
  <w:LsdException Locked="false" Priority="61" Name="Light List Accent 3"/>
  <w:LsdException Locked="false" Priority="62" Name="Light Grid Accent 3"/>
  <w:LsdException Locked="false" Priority="63" Name="Medium Shading 1 Accent 3"/>
  <w:LsdException Locked="false" Priority="64" Name="Medium Shading 2 Accent 3"/>
  <w:LsdException Locked="false" Priority="65" Name="Medium List 1 Accent 3"/>
  <w:LsdException Locked="false" Priority="66" Name="Medium List 2 Accent 3"/>
  <w:LsdException Locked="false" Priority="67" Name="Medium Grid 1 Accent 3"/>
  <w:LsdException Locked="false" Priority="68" Name="Medium Grid 2 Accent 3"/>
  <w:LsdException Locked="false" Priority="69" Name="Medium Grid 3 Accent 3"/>
  <w:LsdException Locked="false" Priority="70" Name="Dark List Accent 3"/>
  <w:LsdException Locked="false" Priority="71" Name="Colorful Shading Accent 3"/>
  <w:LsdException Locked="false" Priority="72" Name="Colorful List Accent 3"/>
  <w:LsdException Locked="false" Priority="73" Name="Colorful Grid Accent 3"/>
  <w:LsdException Locked="false" Priority="60" Name="Light Shading Accent 4"/>
  <w:LsdException Locked="false" Priority="61" Name="Light List Accent 4"/>
  <w:LsdException Locked="false" Priority="62" Name="Light Grid Accent 4"/>
  <w:LsdException Locked="false" Priority="63" Name="Medium Shading 1 Accent 4"/>
  <w:LsdException Locked="false" Priority="64" Name="Medium Shading 2 Accent 4"/>
  <w:LsdException Locked="false" Priority="65" Name="Medium List 1 Accent 4"/>
  <w:LsdException Locked="false" Priority="66" Name="Medium List 2 Accent 4"/>
  <w:LsdException Locked="false" Priority="67" Name="Medium Grid 1 Accent 4"/>
  <w:LsdException Locked="false" Priority="68" Name="Medium Grid 2 Accent 4"/>
  <w:LsdException Locked="false" Priority="69" Name="Medium Grid 3 Accent 4"/>
  <w:LsdException Locked="false" Priority="70" Name="Dark List Accent 4"/>
  <w:LsdException Locked="false" Priority="71" Name="Colorful Shading Accent 4"/>
  <w:LsdException Locked="false" Priority="72" Name="Colorful List Accent 4"/>
  <w:LsdException Locked="false" Priority="73" Name="Colorful Grid Accent 4"/>
  <w:LsdException Locked="false" Priority="60" Name="Light Shading Accent 5"/>
  <w:LsdException Locked="false" Priority="61" Name="Light List Accent 5"/>
  <w:LsdException Locked="false" Priority="62" Name="Light Grid Accent 5"/>
  <w:LsdException Locked="false" Priority="63" Name="Medium Shading 1 Accent 5"/>
  <w:LsdException Locked="false" Priority="64" Name="Medium Shading 2 Accent 5"/>
  <w:LsdException Locked="false" Priority="65" Name="Medium List 1 Accent 5"/>
  <w:LsdException Locked="false" Priority="66" Name="Medium List 2 Accent 5"/>
  <w:LsdException Locked="false" Priority="67" Name="Medium Grid 1 Accent 5"/>
  <w:LsdException Locked="false" Priority="68" Name="Medium Grid 2 Accent 5"/>
  <w:LsdException Locked="false" Priority="69" Name="Medium Grid 3 Accent 5"/>
  <w:LsdException Locked="false" Priority="70" Name="Dark List Accent 5"/>
  <w:LsdException Locked="false" Priority="71" Name="Colorful Shading Accent 5"/>
  <w:LsdException Locked="false" Priority="72" Name="Colorful List Accent 5"/>
  <w:LsdException Locked="false" Priority="73" Name="Colorful Grid Accent 5"/>
  <w:LsdException Locked="false" Priority="60" Name="Light Shading Accent 6"/>
  <w:LsdException Locked="false" Priority="61" Name="Light List Accent 6"/>
  <w:LsdException Locked="false" Priority="62" Name="Light Grid Accent 6"/>
  <w:LsdException Locked="false" Priority="63" Name="Medium Shading 1 Accent 6"/>
  <w:LsdException Locked="false" Priority="64" Name="Medium Shading 2 Accent 6"/>
  <w:LsdException Locked="false" Priority="65" Name="Medium List 1 Accent 6"/>
  <w:LsdException Locked="false" Priority="66" Name="Medium List 2 Accent 6"/>
  <w:LsdException Locked="false" Priority="67" Name="Medium Grid 1 Accent 6"/>
  <w:LsdException Locked="false" Priority="68" Name="Medium Grid 2 Accent 6"/>
  <w:LsdException Locked="false" Priority="69" Name="Medium Grid 3 Accent 6"/>
  <w:LsdException Locked="false" Priority="70" Name="Dark List Accent 6"/>
  <w:LsdException Locked="false" Priority="71" Name="Colorful Shading Accent 6"/>
  <w:LsdException Locked="false" Priority="72" Name="Colorful List Accent 6"/>
  <w:LsdException Locked="false" Priority="73" Name="Colorful Grid Accent 6"/>
  <w:LsdException Locked="false" Priority="19" QFormat="true"
   Name="Subtle Emphasis"/>
  <w:LsdException Locked="false" Priority="21" QFormat="true"
   Name="Intense Emphasis"/>
  <w:LsdException Locked="false" Priority="31" QFormat="true"
   Name="Subtle Reference"/>
  <w:LsdException Locked="false" Priority="32" QFormat="true"
   Name="Intense Reference"/>
  <w:LsdException Locked="false" Priority="33" QFormat="true" Name="Book Title"/>
  <w:LsdException Locked="false" Priority="37" SemiHidden="true"
   UnhideWhenUsed="true" Name="Bibliography"/>
  <w:LsdException Locked="false" Priority="39" SemiHidden="true"
   UnhideWhenUsed="true" QFormat="true" Name="TOC Heading"/>
  <w:LsdException Locked="false" Priority="41" Name="Plain Table 1"/>
  <w:LsdException Locked="false" Priority="42" Name="Plain Table 2"/>
  <w:LsdException Locked="false" Priority="43" Name="Plain Table 3"/>
  <w:LsdException Locked="false" Priority="44" Name="Plain Table 4"/>
  <w:LsdException Locked="false" Priority="45" Name="Plain Table 5"/>
  <w:LsdException Locked="false" Priority="40" Name="Grid Table Light"/>
  <w:LsdException Locked="false" Priority="46" Name="Grid Table 1 Light"/>
  <w:LsdException Locked="false" Priority="47" Name="Grid Table 2"/>
  <w:LsdException Locked="false" Priority="48" Name="Grid Table 3"/>
  <w:LsdException Locked="false" Priority="49" Name="Grid Table 4"/>
  <w:LsdException Locked="false" Priority="50" Name="Grid Table 5 Dark"/>
  <w:LsdException Locked="false" Priority="51" Name="Grid Table 6 Colorful"/>
  <w:LsdException Locked="false" Priority="52" Name="Grid Table 7 Colorful"/>
  <w:LsdException Locked="false" Priority="46"
   Name="Grid Table 1 Light Accent 1"/>
  <w:LsdException Locked="false" Priority="47" Name="Grid Table 2 Accent 1"/>
  <w:LsdException Locked="false" Priority="48" Name="Grid Table 3 Accent 1"/>
  <w:LsdException Locked="false" Priority="49" Name="Grid Table 4 Accent 1"/>
  <w:LsdException Locked="false" Priority="50" Name="Grid Table 5 Dark Accent 1"/>
  <w:LsdException Locked="false" Priority="51"
   Name="Grid Table 6 Colorful Accent 1"/>
  <w:LsdException Locked="false" Priority="52"
   Name="Grid Table 7 Colorful Accent 1"/>
  <w:LsdException Locked="false" Priority="46"
   Name="Grid Table 1 Light Accent 2"/>
  <w:LsdException Locked="false" Priority="47" Name="Grid Table 2 Accent 2"/>
  <w:LsdException Locked="false" Priority="48" Name="Grid Table 3 Accent 2"/>
  <w:LsdException Locked="false" Priority="49" Name="Grid Table 4 Accent 2"/>
  <w:LsdException Locked="false" Priority="50" Name="Grid Table 5 Dark Accent 2"/>
  <w:LsdException Locked="false" Priority="51"
   Name="Grid Table 6 Colorful Accent 2"/>
  <w:LsdException Locked="false" Priority="52"
   Name="Grid Table 7 Colorful Accent 2"/>
  <w:LsdException Locked="false" Priority="46"
   Name="Grid Table 1 Light Accent 3"/>
  <w:LsdException Locked="false" Priority="47" Name="Grid Table 2 Accent 3"/>
  <w:LsdException Locked="false" Priority="48" Name="Grid Table 3 Accent 3"/>
  <w:LsdException Locked="false" Priority="49" Name="Grid Table 4 Accent 3"/>
  <w:LsdException Locked="false" Priority="50" Name="Grid Table 5 Dark Accent 3"/>
  <w:LsdException Locked="false" Priority="51"
   Name="Grid Table 6 Colorful Accent 3"/>
  <w:LsdException Locked="false" Priority="52"
   Name="Grid Table 7 Colorful Accent 3"/>
  <w:LsdException Locked="false" Priority="46"
   Name="Grid Table 1 Light Accent 4"/>
  <w:LsdException Locked="false" Priority="47" Name="Grid Table 2 Accent 4"/>
  <w:LsdException Locked="false" Priority="48" Name="Grid Table 3 Accent 4"/>
  <w:LsdException Locked="false" Priority="49" Name="Grid Table 4 Accent 4"/>
  <w:LsdException Locked="false" Priority="50" Name="Grid Table 5 Dark Accent 4"/>
  <w:LsdException Locked="false" Priority="51"
   Name="Grid Table 6 Colorful Accent 4"/>
  <w:LsdException Locked="false" Priority="52"
   Name="Grid Table 7 Colorful Accent 4"/>
  <w:LsdException Locked="false" Priority="46"
   Name="Grid Table 1 Light Accent 5"/>
  <w:LsdException Locked="false" Priority="47" Name="Grid Table 2 Accent 5"/>
  <w:LsdException Locked="false" Priority="48" Name="Grid Table 3 Accent 5"/>
  <w:LsdException Locked="false" Priority="49" Name="Grid Table 4 Accent 5"/>
  <w:LsdException Locked="false" Priority="50" Name="Grid Table 5 Dark Accent 5"/>
  <w:LsdException Locked="false" Priority="51"
   Name="Grid Table 6 Colorful Accent 5"/>
  <w:LsdException Locked="false" Priority="52"
   Name="Grid Table 7 Colorful Accent 5"/>
  <w:LsdException Locked="false" Priority="46"
   Name="Grid Table 1 Light Accent 6"/>
  <w:LsdException Locked="false" Priority="47" Name="Grid Table 2 Accent 6"/>
  <w:LsdException Locked="false" Priority="48" Name="Grid Table 3 Accent 6"/>
  <w:LsdException Locked="false" Priority="49" Name="Grid Table 4 Accent 6"/>
  <w:LsdException Locked="false" Priority="50" Name="Grid Table 5 Dark Accent 6"/>
  <w:LsdException Locked="false" Priority="51"
   Name="Grid Table 6 Colorful Accent 6"/>
  <w:LsdException Locked="false" Priority="52"
   Name="Grid Table 7 Colorful Accent 6"/>
  <w:LsdException Locked="false" Priority="46" Name="List Table 1 Light"/>
  <w:LsdException Locked="false" Priority="47" Name="List Table 2"/>
  <w:LsdException Locked="false" Priority="48" Name="List Table 3"/>
  <w:LsdException Locked="false" Priority="49" Name="List Table 4"/>
  <w:LsdException Locked="false" Priority="50" Name="List Table 5 Dark"/>
  <w:LsdException Locked="false" Priority="51" Name="List Table 6 Colorful"/>
  <w:LsdException Locked="false" Priority="52" Name="List Table 7 Colorful"/>
  <w:LsdException Locked="false" Priority="46"
   Name="List Table 1 Light Accent 1"/>
  <w:LsdException Locked="false" Priority="47" Name="List Table 2 Accent 1"/>
  <w:LsdException Locked="false" Priority="48" Name="List Table 3 Accent 1"/>
  <w:LsdException Locked="false" Priority="49" Name="List Table 4 Accent 1"/>
  <w:LsdException Locked="false" Priority="50" Name="List Table 5 Dark Accent 1"/>
  <w:LsdException Locked="false" Priority="51"
   Name="List Table 6 Colorful Accent 1"/>
  <w:LsdException Locked="false" Priority="52"
   Name="List Table 7 Colorful Accent 1"/>
  <w:LsdException Locked="false" Priority="46"
   Name="List Table 1 Light Accent 2"/>
  <w:LsdException Locked="false" Priority="47" Name="List Table 2 Accent 2"/>
  <w:LsdException Locked="false" Priority="48" Name="List Table 3 Accent 2"/>
  <w:LsdException Locked="false" Priority="49" Name="List Table 4 Accent 2"/>
  <w:LsdException Locked="false" Priority="50" Name="List Table 5 Dark Accent 2"/>
  <w:LsdException Locked="false" Priority="51"
   Name="List Table 6 Colorful Accent 2"/>
  <w:LsdException Locked="false" Priority="52"
   Name="List Table 7 Colorful Accent 2"/>
  <w:LsdException Locked="false" Priority="46"
   Name="List Table 1 Light Accent 3"/>
  <w:LsdException Locked="false" Priority="47" Name="List Table 2 Accent 3"/>
  <w:LsdException Locked="false" Priority="48" Name="List Table 3 Accent 3"/>
  <w:LsdException Locked="false" Priority="49" Name="List Table 4 Accent 3"/>
  <w:LsdException Locked="false" Priority="50" Name="List Table 5 Dark Accent 3"/>
  <w:LsdException Locked="false" Priority="51"
   Name="List Table 6 Colorful Accent 3"/>
  <w:LsdException Locked="false" Priority="52"
   Name="List Table 7 Colorful Accent 3"/>
  <w:LsdException Locked="false" Priority="46"
   Name="List Table 1 Light Accent 4"/>
  <w:LsdException Locked="false" Priority="47" Name="List Table 2 Accent 4"/>
  <w:LsdException Locked="false" Priority="48" Name="List Table 3 Accent 4"/>
  <w:LsdException Locked="false" Priority="49" Name="List Table 4 Accent 4"/>
  <w:LsdException Locked="false" Priority="50" Name="List Table 5 Dark Accent 4"/>
  <w:LsdException Locked="false" Priority="51"
   Name="List Table 6 Colorful Accent 4"/>
  <w:LsdException Locked="false" Priority="52"
   Name="List Table 7 Colorful Accent 4"/>
  <w:LsdException Locked="false" Priority="46"
   Name="List Table 1 Light Accent 5"/>
  <w:LsdException Locked="false" Priority="47" Name="List Table 2 Accent 5"/>
  <w:LsdException Locked="false" Priority="48" Name="List Table 3 Accent 5"/>
  <w:LsdException Locked="false" Priority="49" Name="List Table 4 Accent 5"/>
  <w:LsdException Locked="false" Priority="50" Name="List Table 5 Dark Accent 5"/>
  <w:LsdException Locked="false" Priority="51"
   Name="List Table 6 Colorful Accent 5"/>
  <w:LsdException Locked="false" Priority="52"
   Name="List Table 7 Colorful Accent 5"/>
  <w:LsdException Locked="false" Priority="46"
   Name="List Table 1 Light Accent 6"/>
  <w:LsdException Locked="false" Priority="47" Name="List Table 2 Accent 6"/>
  <w:LsdException Locked="false" Priority="48" Name="List Table 3 Accent 6"/>
  <w:LsdException Locked="false" Priority="49" Name="List Table 4 Accent 6"/>
  <w:LsdException Locked="false" Priority="50" Name="List Table 5 Dark Accent 6"/>
  <w:LsdException Locked="false" Priority="51"
   Name="List Table 6 Colorful Accent 6"/>
  <w:LsdException Locked="false" Priority="52"
   Name="List Table 7 Colorful Accent 6"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Mention"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Smart Hyperlink"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Hashtag"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Unresolved Mention"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Smart Link"/>
 </w:LatentStyles>
</xml><![endif]-->
<style>
<!--
 /* Font Definitions */
 @font-face
	{font-family:"Cambria Math";
	panose-1:2 4 5 3 5 4 6 3 2 4;
	mso-font-charset:0;
	mso-generic-font-family:roman;
	mso-font-pitch:variable;
	mso-font-signature:-536869121 1107305727 33554432 0 415 0;}
@font-face
	{font-family:Calibri;
	panose-1:2 15 5 2 2 2 4 3 2 4;
	mso-font-charset:0;
	mso-generic-font-family:swiss;
	mso-font-pitch:variable;
	mso-font-signature:-469750017 -1040178053 9 0 511 0;}
 /* Style Definitions */
 p.MsoNormal, li.MsoNormal, div.MsoNormal
	{mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-parent:"";
	margin-top:0in;
	margin-right:0in;
	margin-bottom:8.0pt;
	margin-left:0in;
	line-height:107%;
	mso-pagination:widow-orphan;
	font-size:11.0pt;
	font-family:"Calibri",sans-serif;
	mso-ascii-font-family:Calibri;
	mso-ascii-theme-font:minor-latin;
	mso-fareast-font-family:Calibri;
	mso-fareast-theme-font:minor-latin;
	mso-hansi-font-family:Calibri;
	mso-hansi-theme-font:minor-latin;
	mso-bidi-font-family:Arial;
	mso-bidi-theme-font:minor-bidi;
	mso-font-kerning:1.0pt;
	mso-ligatures:standardcontextual;
	mso-ansi-language:EN-US;
	mso-fareast-language:EN-US;}
p.MsoHeader, li.MsoHeader, div.MsoHeader
	{mso-style-priority:99;
	mso-style-link:"Header Char";
	margin:0in;
	mso-pagination:widow-orphan;
	tab-stops:center 3.25in right 6.5in;
	font-size:11.0pt;
	font-family:"Calibri",sans-serif;
	mso-ascii-font-family:Calibri;
	mso-ascii-theme-font:minor-latin;
	mso-fareast-font-family:Calibri;
	mso-fareast-theme-font:minor-latin;
	mso-hansi-font-family:Calibri;
	mso-hansi-theme-font:minor-latin;
	mso-bidi-font-family:Arial;
	mso-bidi-theme-font:minor-bidi;
	mso-font-kerning:1.0pt;
	mso-ligatures:standardcontextual;
	mso-ansi-language:EN-US;
	mso-fareast-language:EN-US;}
p.MsoFooter, li.MsoFooter, div.MsoFooter
	{mso-style-priority:99;
	mso-style-link:"Footer Char";
	margin:0in;
	mso-pagination:widow-orphan;
	tab-stops:center 3.25in right 6.5in;
	font-size:11.0pt;
	font-family:"Calibri",sans-serif;
	mso-ascii-font-family:Calibri;
	mso-ascii-theme-font:minor-latin;
	mso-fareast-font-family:Calibri;
	mso-fareast-theme-font:minor-latin;
	mso-hansi-font-family:Calibri;
	mso-hansi-theme-font:minor-latin;
	mso-bidi-font-family:Arial;
	mso-bidi-theme-font:minor-bidi;
	mso-font-kerning:1.0pt;
	mso-ligatures:standardcontextual;
	mso-ansi-language:EN-US;
	mso-fareast-language:EN-US;}
span.HeaderChar
	{mso-style-name:"Header Char";
	mso-style-priority:99;
	mso-style-unhide:no;
	mso-style-locked:yes;
	mso-style-link:Header;}
span.FooterChar
	{mso-style-name:"Footer Char";
	mso-style-priority:99;
	mso-style-unhide:no;
	mso-style-locked:yes;
	mso-style-link:Footer;}
p.Default, li.Default, div.Default
	{mso-style-name:Default;
	mso-style-unhide:no;
	mso-style-parent:"";
	margin:0in;
	mso-pagination:widow-orphan;
	mso-layout-grid-align:none;
	text-autospace:none;
	font-size:12.0pt;
	font-family:"Arial",sans-serif;
	mso-fareast-font-family:Calibri;
	mso-fareast-theme-font:minor-latin;
	color:black;
	mso-ligatures:standardcontextual;
	mso-ansi-language:EN-US;
	mso-fareast-language:EN-US;}
span.SpellE
	{mso-style-name:"";
	mso-spl-e:yes;}
span.GramE
	{mso-style-name:"";
	mso-gram-e:yes;}
.MsoChpDefault
	{mso-style-type:export-only;
	mso-default-props:yes;
	font-family:"Calibri",sans-serif;
	mso-ascii-font-family:Calibri;
	mso-ascii-theme-font:minor-latin;
	mso-fareast-font-family:Calibri;
	mso-fareast-theme-font:minor-latin;
	mso-hansi-font-family:Calibri;
	mso-hansi-theme-font:minor-latin;
	mso-bidi-font-family:Arial;
	mso-bidi-theme-font:minor-bidi;
	mso-ansi-language:EN-US;
	mso-fareast-language:EN-US;}
.MsoPapDefault
	{mso-style-type:export-only;
	margin-bottom:8.0pt;
	line-height:107%;}
 /* Page Definitions */
 @page
	{mso-footnote-separator:url("Master%20of%20Computer%20Science%20\(1\)_files/header.htm") fs;
	mso-footnote-continuation-separator:url("Master%20of%20Computer%20Science%20\(1\)_files/header.htm") fcs;
	mso-endnote-separator:url("Master%20of%20Computer%20Science%20\(1\)_files/header.htm") es;
	mso-endnote-continuation-separator:url("Master%20of%20Computer%20Science%20\(1\)_files/header.htm") ecs;}
@page WordSection1
	{size:8.5in 11.0in;
	margin:.5in 1.0in 27.0pt 1.0in;
	mso-header-margin:.5in;
	mso-footer-margin:.5in;
	mso-paper-source:0;}
div.WordSection1
	{page:WordSection1;}
-->
</style>
<!--[if gte mso 10]>
<style>
 /* Style Definitions */
 table.MsoNormalTable
	{mso-style-name:"Table Normal";
	mso-tstyle-rowband-size:0;
	mso-tstyle-colband-size:0;
	mso-style-noshow:yes;
	mso-style-priority:99;
	mso-style-parent:"";
	mso-padding-alt:0in 5.4pt 0in 5.4pt;
	mso-para-margin-top:0in;
	mso-para-margin-right:0in;
	mso-para-margin-bottom:8.0pt;
	mso-para-margin-left:0in;
	line-height:107%;
	mso-pagination:widow-orphan;
	font-size:11.0pt;
	font-family:"Calibri",sans-serif;
	mso-ascii-font-family:Calibri;
	mso-ascii-theme-font:minor-latin;
	mso-hansi-font-family:Calibri;
	mso-hansi-theme-font:minor-latin;
	mso-bidi-font-family:Arial;
	mso-bidi-theme-font:minor-bidi;
	mso-font-kerning:1.0pt;
	mso-ligatures:standardcontextual;
	mso-ansi-language:EN-US;
	mso-fareast-language:EN-US;}
table.MsoTableGrid
	{mso-style-name:"Table Grid";
	mso-tstyle-rowband-size:0;
	mso-tstyle-colband-size:0;
	mso-style-priority:39;
	mso-style-unhide:no;
	border:solid windowtext 1.0pt;
	mso-border-alt:solid windowtext .5pt;
	mso-padding-alt:0in 5.4pt 0in 5.4pt;
	mso-border-insideh:.5pt solid windowtext;
	mso-border-insidev:.5pt solid windowtext;
	mso-para-margin:0in;
	mso-pagination:widow-orphan;
	font-size:11.0pt;
	font-family:"Calibri",sans-serif;
	mso-ascii-font-family:Calibri;
	mso-ascii-theme-font:minor-latin;
	mso-hansi-font-family:Calibri;
	mso-hansi-theme-font:minor-latin;
	mso-bidi-font-family:Arial;
	mso-bidi-theme-font:minor-bidi;
	mso-font-kerning:1.0pt;
	mso-ligatures:standardcontextual;
	mso-ansi-language:EN-US;
	mso-fareast-language:EN-US;}
</style>
<![endif]--><!--[if gte mso 9]><xml>
 <o:shapedefaults v:ext="edit" spidmax="1026"/>
</xml><![endif]--><!--[if gte mso 9]><xml>
 <o:shapelayout v:ext="edit">
  <o:idmap v:ext="edit" data="1"/>
 </o:shapelayout></xml><![endif]-->
</head>

<body style='tab-interval:.5in;word-wrap:break-word'>

<div class=WordSection1>

<p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal style='margin-bottom:0in'><b><span lang=EN-US
style='font-size:10.0pt;line-height:107%;font-family:"Times New Roman",serif;
mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
major-bidi'><o:p>&nbsp;</o:p></span></b></p>

<p class=MsoNormal style='margin-bottom:0in'><b><span lang=EN-US
style='font-size:10.0pt;line-height:107%;font-family:"Times New Roman",serif;
mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
major-bidi'><o:p>&nbsp;</o:p></span></b></p>

<p class=MsoNormal style='margin-bottom:0in'><b><span lang=EN-US
style='font-size:10.0pt;line-height:107%;font-family:"Times New Roman",serif;
mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
major-bidi'><o:p>&nbsp;</o:p></span></b></p>

<p class=MsoNormal style='margin-bottom:0in'><b><span lang=EN-US
style='font-size:10.0pt;line-height:107%;font-family:"Times New Roman",serif;
mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
major-bidi'><o:p>&nbsp;</o:p></span></b></p>

<p class=MsoNormal style='margin-bottom:0in'><b><span lang=EN-US
style='font-size:10.0pt;line-height:107%;font-family:"Times New Roman",serif;
mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
major-bidi'><o:p>&nbsp;</o:p></span></b></p>

<p class=MsoNormal style='margin-bottom:0in'><b><span lang=EN-US
style='font-size:10.0pt;line-height:107%;font-family:"Times New Roman",serif;
mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
major-bidi'><o:p>&nbsp;</o:p></span></b></p>

<p class=MsoNormal style='margin-bottom:0in'><b><span lang=EN-US
style='font-size:10.0pt;line-height:107%;font-family:"Times New Roman",serif;
mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
major-bidi'><o:p>&nbsp;</o:p></span></b></p>

<p class=MsoNormal style='margin-bottom:0in'><b><span lang=EN-US
style='font-size:10.0pt;line-height:107%;font-family:"Times New Roman",serif;
mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
major-bidi'>National <span class=GramE>No:-</span> <?php if(isset($student_profile_common)) echo $student_profile_common['identity_no']; else echo "" ;?><o:p></o:p></span></b></p>

<p class=Default><b><span lang=EN-US style='font-size:10.0pt;font-family:"Times New Roman",serif;
mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
major-bidi'>University <span class=GramE>No:-</span> 527884477<o:p></o:p></span></b></p>

<p class=MsoNormal style='margin-bottom:0in'><span lang=EN-US><span
style='mso-spacerun:yes'>�</span></span><b><span lang=EN-US style='font-size:
10.0pt;line-height:107%;font-family:"Times New Roman",serif;mso-ascii-theme-font:
major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'><o:p></o:p></span></b></p>

<p class=MsoNormal style='margin-bottom:0in'><b><u><span lang=EN-US
style='font-family:"Times New Roman",serif;mso-ascii-theme-font:major-bidi;
mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'><o:p><span
 style='text-decoration:none'>&nbsp;</span></o:p></span></u></b></p>

<p class=MsoNormal align=center style='text-align:center'><b><span lang=EN-US
style='font-size:16.0pt;line-height:107%;font-family:"Times New Roman",serif;
mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
major-bidi'>Postgraduate Studies<o:p></o:p></span></b></p>

<p class=MsoNormal align=center style='text-align:center'><span lang=EN-US
style='font-size:2.0pt;line-height:107%;font-family:"Times New Roman",serif;
mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
major-bidi'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal style='margin-top:0in;margin-right:0in;margin-bottom:0in;
margin-left:9.0pt;text-align:justify;text-indent:-9.0pt'><span lang=EN-US
style='font-size:12.0pt;line-height:107%;font-family:"Times New Roman",serif;
mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
major-bidi'><span style='mso-spacerun:yes'> &nbsp; </span>This is to certify that / </span><b><u><span
lang=EN-US style='font-size:14.0pt;line-height:107%;font-family:"Times New Roman",serif;
mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
major-bidi'><?php if(isset($stud_index)) echo $stud_index['stud_name'] . " " . $stud_index['stud_surname'] . " " . $stud_index['familyname'] ; else echo "";  ?></span></u></b><span lang=EN-US
style='font-size:14.0pt;line-height:107%;font-family:"Times New Roman",serif;
mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
major-bidi'> </span><span lang=EN-US style='font-size:12.0pt;line-height:107%;
font-family:"Times New Roman",serif;mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:
major-bidi;mso-bidi-theme-font:major-bidi'>/ <b>(<?php   

if($student_profile_common['nationality_code'] == 0){
  echo 'Foreign';
}
if($student_profile_common['nationality_code'] == 1){
  echo 'Sudanese Nationality';

}
if($student_profile_common['nationality_code'] == 4){
  echo 'Refugees';

}
?>)</b> has
successfully passed the prescribed examinations and is hereby awarded the
degree of <b>Master</b> of <b><u><?php  echo Get_Major_Name($student_profile_common['major_code']); ?> (<?php  echo Get_Major_Name($student_profile_common['major_code']); ?>)</u>
</b>by the senate of the university on the <b>

  <?php  //echo Get_Date($std_cert_id['senate_on']); ?>
</b>.
with a <b>CGPA /<?php if(isset($stud_transcript_sql)) echo $stud_transcript_sql['cgpa']; else echo "" ;?>/.<o:p></o:p></b></span></p>

<p class=MsoNormal style='margin-bottom:0in;text-align:justify'><span
lang=EN-US style='font-size:12.0pt;line-height:107%;font-family:"Times New Roman",serif;
mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
major-bidi'><span style='mso-spacerun:yes'>&nbsp;&nbsp; </span>Below are the details of the
grades he obtained.<o:p></o:p></span></p>

<p class=MsoNormal style='margin-bottom:0in;text-align:justify'><span
lang=EN-US style='font-size:1.0pt;line-height:107%;font-family:"Times New Roman",serif;
mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
major-bidi'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal style='margin-bottom:0in;text-align:justify'><span
lang=EN-US style='font-size:1.0pt;line-height:107%;font-family:"Times New Roman",serif;
mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
major-bidi'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal style='margin-bottom:0in;text-align:justify'><span
lang=EN-US style='font-size:1.0pt;line-height:107%;font-family:"Times New Roman",serif;
mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
major-bidi'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal style='margin-bottom:0in;text-align:justify'><span
lang=EN-US style='font-size:1.0pt;line-height:107%;font-family:"Times New Roman",serif;
mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
major-bidi'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal style='margin-bottom:0in;text-align:justify'><span
lang=EN-US style='font-size:1.0pt;line-height:107%;font-family:"Times New Roman",serif;
mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
major-bidi'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal style='margin-bottom:0in;text-align:justify'><span
lang=EN-US style='font-size:1.0pt;line-height:107%;font-family:"Times New Roman",serif;
mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
major-bidi'><o:p>&nbsp;</o:p></span></p>



<!-- TABLE START ########################### -->
 
<table class=MsoTableGrid border=0 cellspacing=0 cellpadding=0 width=684
 style='width:513.0pt;border-collapse:collapse;border:none;mso-yfti-tbllook:
 1184;mso-padding-alt:0in 5.4pt 0in 5.4pt;mso-border-insideh:none;mso-border-insidev:
 none'>
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;mso-yfti-lastrow:yes;
  height:31.05pt'>
  <td width=684 valign=top style='width:513.0pt;background:white;mso-background-themecolor:
  background1;padding:0in 5.4pt 0in 5.4pt;height:31.05pt'>
  <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
  normal'><span lang=EN-US style='font-size:9.0pt;font-family:"Times New Roman",serif;
  mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
  major-bidi;color:black;mso-color-alt:windowtext'><span
  style='mso-spacerun:yes'>&nbsp; </span><b>Semester <span class=GramE>One:-</span> February
  <span style='mso-spacerun:yes'>&nbsp;</span>2021- July 2021</b></span><b><span
  lang=EN-US style='font-size:9.0pt;font-family:"Times New Roman",serif;
  mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
  major-bidi'><o:p></o:p></span></b></p>
  <table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0 width=618
   style='width:463.4pt;border-collapse:collapse;border:none;mso-border-alt:
   solid windowtext .5pt;mso-yfti-tbllook:1184;mso-padding-alt:0in 5.4pt 0in 5.4pt'>
   <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;height:10.35pt'>
    <td width=64 valign=top style='width:48.25pt;border:solid windowtext 1.0pt;
    mso-border-alt:solid windowtext .5pt;background:#D9D9D9;mso-background-themecolor:
    background1;mso-background-themeshade:217;padding:0in 5.4pt 0in 5.4pt;
    height:10.35pt'>
    <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
    normal'><span lang=EN-US style='font-size:9.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi;color:black;mso-color-alt:windowtext'>Code</span><span
    lang=EN-US style='font-size:9.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi'><o:p></o:p></span></p>
    </td>
    <td width=36 valign=top style='width:27.0pt;border:solid windowtext 1.0pt;
    border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
    solid windowtext .5pt;background:#D9D9D9;mso-background-themecolor:background1;
    mso-background-themeshade:217;padding:0in 5.4pt 0in 5.4pt;height:10.35pt'>
    <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
    normal'><span class=SpellE><span lang=EN-US style='font-size:9.0pt;
    font-family:"Times New Roman",serif;mso-ascii-theme-font:major-bidi;
    mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi;color:black;
    mso-color-alt:windowtext'>Cr.H</span></span><span lang=EN-US
    style='font-size:9.0pt;font-family:"Times New Roman",serif;mso-ascii-theme-font:
    major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'><o:p></o:p></span></p>
    </td>
    <td width=190 valign=top style='width:142.45pt;border:solid windowtext 1.0pt;
    border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
    solid windowtext .5pt;background:#D9D9D9;mso-background-themecolor:background1;
    mso-background-themeshade:217;padding:0in 5.4pt 0in 5.4pt;height:10.35pt'>
    <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
    normal'><span lang=EN-US style='font-size:9.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi;color:black;mso-color-alt:windowtext'>Subject</span><span
    lang=EN-US style='font-size:9.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi'><o:p></o:p></span></p>
    </td>
    <td width=47 valign=top style='width:35.3pt;border:solid windowtext 1.0pt;
    border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
    solid windowtext .5pt;background:#D9D9D9;mso-background-themecolor:background1;
    mso-background-themeshade:217;padding:0in 5.4pt 0in 5.4pt;height:10.35pt'>
    <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
    normal'><span lang=EN-US style='font-size:9.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi;color:black;mso-color-alt:windowtext'>Grade</span><span
    lang=EN-US style='font-size:9.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi'><o:p></o:p></span></p>
    </td>
    <td width=62 valign=top style='width:46.4pt;border:solid windowtext 1.0pt;
    border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
    solid windowtext .5pt;background:#D9D9D9;mso-background-themecolor:background1;
    mso-background-themeshade:217;padding:0in 5.4pt 0in 5.4pt;height:10.35pt'>
    <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
    normal'><span lang=EN-US style='font-size:9.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi;color:black;mso-color-alt:windowtext'>Code</span><span
    lang=EN-US style='font-size:9.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi'><o:p></o:p></span></p>
    </td>
    <td width=40 valign=top style='width:29.75pt;border:solid windowtext 1.0pt;
    border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
    solid windowtext .5pt;background:#D9D9D9;mso-background-themecolor:background1;
    mso-background-themeshade:217;padding:0in 5.4pt 0in 5.4pt;height:10.35pt'>
    <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
    normal'><span class=SpellE><span lang=EN-US style='font-size:9.0pt;
    font-family:"Times New Roman",serif;mso-ascii-theme-font:major-bidi;
    mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi;color:black;
    mso-color-alt:windowtext'>Cr.H</span></span><span lang=EN-US
    style='font-size:9.0pt;font-family:"Times New Roman",serif;mso-ascii-theme-font:
    major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'><o:p></o:p></span></p>
    </td>
    <td width=131 valign=top style='width:98.45pt;border:solid windowtext 1.0pt;
    border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
    solid windowtext .5pt;background:#D9D9D9;mso-background-themecolor:background1;
    mso-background-themeshade:217;padding:0in 5.4pt 0in 5.4pt;height:10.35pt'>
    <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
    normal'><span lang=EN-US style='font-size:9.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi;color:black;mso-color-alt:windowtext'>Subject</span><span
    lang=EN-US style='font-size:9.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi'><o:p></o:p></span></p>
    </td>
    <td width=48 valign=top style='width:35.8pt;border:solid windowtext 1.0pt;
    border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
    solid windowtext .5pt;background:#D9D9D9;mso-background-themecolor:background1;
    mso-background-themeshade:217;padding:0in 5.4pt 0in 5.4pt;height:10.35pt'>
    <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
    normal'><span lang=EN-US style='font-size:9.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi;color:black;mso-color-alt:windowtext'>Grade</span><span
    lang=EN-US style='font-size:9.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi'><o:p></o:p></span></p>
    </td>
   </tr>
   <tr style='mso-yfti-irow:1;height:4.9pt'>
    <td width=64 valign=top style='width:48.25pt;border:solid windowtext 1.0pt;
    border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:
    solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:4.9pt'>
    <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
    normal'><span lang=EN-US style='font-size:8.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi'>MSCS02<o:p></o:p></span></p>
    </td>
    <td width=36 valign=top style='width:27.0pt;border-top:none;border-left:
    none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
    mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
    mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;
    height:4.9pt'>
    <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
    line-height:normal'><span lang=EN-US style='font-size:8.0pt;font-family:
    "Times New Roman",serif;mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:
    major-bidi;mso-bidi-theme-font:major-bidi'>3<o:p></o:p></span></p>
    </td>
    <td width=190 valign=top style='width:142.45pt;border-top:none;border-left:
    none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
    mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
    mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;
    height:4.9pt'>
    <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
    normal;background:white;mso-background-themecolor:background1'><span
    lang=EN-US style='font-size:8.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi;color:black;mso-color-alt:windowtext'>Advanced Computer Architecture</span><span lang=EN-US style='font-size:8.0pt;font-family:
    "Times New Roman",serif;mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:
    major-bidi;mso-bidi-theme-font:major-bidi'><o:p></o:p></span></p>
    </td>
    <td width=47 valign=top style='width:35.3pt;border-top:none;border-left:
    none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
    mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
    mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;
    height:4.9pt'>
    <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
    normal;background:white;mso-background-themecolor:background1'><span
    lang=EN-US style='font-size:8.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi;color:black;mso-color-alt:windowtext'>C+</span><span lang=EN-US
    style='font-size:8.0pt;font-family:"Times New Roman",serif;mso-ascii-theme-font:
    major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'><o:p></o:p></span></p>
    </td>
    <td width=62 valign=top style='width:46.4pt;border-top:none;border-left:
    none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
    mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
    mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;
    height:4.9pt'>
    <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
    normal;background:white;mso-background-themecolor:background1'><span
    lang=EN-US style='font-size:8.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi;color:black;mso-color-alt:windowtext'>MSCS05</span><span
    lang=EN-US style='font-size:8.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi'><o:p></o:p></span></p>
    </td>
    <td width=40 valign=top style='width:29.75pt;border-top:none;border-left:
    none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
    mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
    mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;
    height:4.9pt'>
    <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
    line-height:normal;background:white;mso-background-themecolor:background1'><span
    lang=EN-US style='font-size:8.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi;color:black;mso-color-alt:windowtext'>3</span><span lang=EN-US
    style='font-size:8.0pt;font-family:"Times New Roman",serif;mso-ascii-theme-font:
    major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'><o:p></o:p></span></p>
    </td>
    <td width=131 valign=top style='width:98.45pt;border-top:none;border-left:
    none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
    mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
    mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;
    height:4.9pt'>
    <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
    normal;background:white;mso-background-themecolor:background1'><span
    lang=EN-US style='font-size:8.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi;color:black;mso-color-alt:windowtext'>Principles of Programming
    Language</span><span lang=EN-US style='font-size:8.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi'><o:p></o:p></span></p>
    </td>
    <td width=48 valign=top style='width:35.8pt;border-top:none;border-left:
    none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
    mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
    mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;
    height:4.9pt'>
    <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
    normal;background:white;mso-background-themecolor:background1'><span
    lang=EN-US style='font-size:8.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi;color:black;mso-color-alt:windowtext'>C</span><span lang=EN-US
    style='font-size:8.0pt;font-family:"Times New Roman",serif;mso-ascii-theme-font:
    major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'><o:p></o:p></span></p>
    </td>
   </tr>
   <tr style='mso-yfti-irow:2;height:8.45pt'>
    <td width=64 valign=top style='width:48.25pt;border:solid windowtext 1.0pt;
    border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:
    solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:8.45pt'>
    <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
    normal'><span lang=EN-US style='font-size:8.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi'>MSCS03<o:p></o:p></span></p>
    </td>
    <td width=36 valign=top style='width:27.0pt;border-top:none;border-left:
    none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
    mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
    mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;
    height:8.45pt'>
    <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
    line-height:normal'><span lang=EN-US style='font-size:8.0pt;font-family:
    "Times New Roman",serif;mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:
    major-bidi;mso-bidi-theme-font:major-bidi'>3<o:p></o:p></span></p>
    </td>
    <td width=190 valign=top style='width:142.45pt;border-top:none;border-left:
    none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
    mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
    mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;
    height:8.45pt'>
    <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
    normal;background:white;mso-background-themecolor:background1'><span
    lang=EN-US style='font-size:8.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi;color:black;mso-color-alt:windowtext'>Advanced Algorithm Design
    and Analysis</span><span lang=EN-US style='font-size:8.0pt;font-family:
    "Times New Roman",serif;mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:
    major-bidi;mso-bidi-theme-font:major-bidi'><o:p></o:p></span></p>
    </td>
    <td width=47 valign=top style='width:35.3pt;border-top:none;border-left:
    none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
    mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
    mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;
    height:8.45pt'>
    <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
    normal;background:white;mso-background-themecolor:background1'><span
    lang=EN-US style='font-size:8.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi;color:black;mso-color-alt:windowtext'>C+</span><span lang=EN-US
    style='font-size:8.0pt;font-family:"Times New Roman",serif;mso-ascii-theme-font:
    major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'><o:p></o:p></span></p>
    </td>
    <td width=62 valign=top style='width:46.4pt;border:none;mso-border-top-alt:
    solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;padding:
    0in 5.4pt 0in 5.4pt;height:8.45pt'>
    <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
    normal;background:white;mso-background-themecolor:background1'><span
    lang=EN-US style='font-size:8.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi'><o:p>&nbsp;</o:p></span></p>
    </td>
    <td width=40 valign=top style='width:29.75pt;border:none;mso-border-top-alt:
    solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:8.45pt'>
    <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
    line-height:normal;background:white;mso-background-themecolor:background1'><span
    lang=EN-US style='font-size:8.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi'><o:p>&nbsp;</o:p></span></p>
    </td>
    <td width=131 valign=top style='width:98.45pt;border:none;mso-border-top-alt:
    solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:8.45pt'>
    <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
    normal;background:white;mso-background-themecolor:background1'><span
    lang=EN-US style='font-size:8.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi'><o:p>&nbsp;</o:p></span></p>
    </td>
    <td width=48 valign=top style='width:35.8pt;border:none;mso-border-top-alt:
    solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:8.45pt'>
    <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
    normal;background:white;mso-background-themecolor:background1'><span
    lang=EN-US style='font-size:9.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi'><o:p>&nbsp;</o:p></span></p>
    </td>
   </tr>
   <tr style='mso-yfti-irow:3;mso-yfti-lastrow:yes;height:8.45pt'>
    <td width=64 valign=top style='width:48.25pt;border:solid windowtext 1.0pt;
    border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:
    solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:8.45pt'>
    <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
    normal'><span lang=EN-US style='font-size:8.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi'>MSCS04<o:p></o:p></span></p>
    </td>
    <td width=36 valign=top style='width:27.0pt;border-top:none;border-left:
    none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
    mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
    mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;
    height:8.45pt'>
    <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
    line-height:normal'><span lang=EN-US style='font-size:8.0pt;font-family:
    "Times New Roman",serif;mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:
    major-bidi;mso-bidi-theme-font:major-bidi'>3<o:p></o:p></span></p>
    </td>
    <td width=190 valign=top style='width:142.45pt;border-top:none;border-left:
    none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
    mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
    mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;
    height:8.45pt'>
    <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
    normal;background:white;mso-background-themecolor:background1'><span
    lang=EN-US style='font-size:8.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi;color:black;mso-color-alt:windowtext'>Advanced Operating System</span><span
    lang=EN-US style='font-size:8.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi'><o:p></o:p></span></p>
    </td>
    <td width=47 valign=top style='width:35.3pt;border-top:none;border-left:
    none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
    mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
    mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;
    height:8.45pt'>
    <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
    normal;background:white;mso-background-themecolor:background1'><span
    lang=EN-US style='font-size:8.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi;color:black;mso-color-alt:windowtext'>C</span><span lang=EN-US
    style='font-size:8.0pt;font-family:"Times New Roman",serif;mso-ascii-theme-font:
    major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'><o:p></o:p></span></p>
    </td>
    <td width=62 valign=top style='width:46.4pt;border:none;mso-border-left-alt:
    solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:8.45pt'>
    <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
    normal;background:white;mso-background-themecolor:background1'><span
    lang=EN-US style='font-size:8.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi'><o:p>&nbsp;</o:p></span></p>
    </td>
    <td width=40 valign=top style='width:29.75pt;border:none;padding:0in 5.4pt 0in 5.4pt;
    height:8.45pt'>
    <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
    line-height:normal;background:white;mso-background-themecolor:background1'><span
    lang=EN-US style='font-size:8.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi'><o:p>&nbsp;</o:p></span></p>
    </td>
    <td width=131 valign=top style='width:98.45pt;border:none;padding:0in 5.4pt 0in 5.4pt;
    height:8.45pt'>
    <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
    normal;background:white;mso-background-themecolor:background1'><span
    lang=EN-US style='font-size:8.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi'><o:p>&nbsp;</o:p></span></p>
    </td>
    <td width=48 valign=top style='width:35.8pt;border:none;padding:0in 5.4pt 0in 5.4pt;
    height:8.45pt'>
    <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
    normal;background:white;mso-background-themecolor:background1'><span
    lang=EN-US style='font-size:9.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi'><o:p>&nbsp;</o:p></span></p>
    </td>
   </tr>
  </table>


  <!-- TABLE END///////////////////////////////////////////////////////////////// -->


  <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
  normal'><span lang=EN-US style='font-size:9.0pt;font-family:"Times New Roman",serif;
  mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
  major-bidi;color:black;mso-color-alt:windowtext'><span
  style='mso-spacerun:yes'>�����������������������������������������������������������������������������������������������������������������
  </span><span style='mso-spacerun:yes'>����</span><span
  style='mso-spacerun:yes'>�</span><span class=GramE>GPA:-</span> 2.25ccc  <span
  style='mso-spacerun:yes'>���������������� </span>CGPA:-2.25</span><span
  lang=EN-US style='font-size:9.0pt;font-family:"Times New Roman",serif;
  mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
  major-bidi'><o:p></o:p></span></p>
  <table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
   style='border-collapse:collapse;border:none;mso-border-alt:solid windowtext .5pt;
   mso-yfti-tbllook:1184;mso-padding-alt:0in 5.4pt 0in 5.4pt'>
   <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;height:2.7pt'>
    <td width=623 colspan=8 valign=top style='width:467.0pt;border:none;
    border-bottom:solid windowtext 1.0pt;mso-border-bottom-alt:solid windowtext .5pt;
    background:white;mso-background-themecolor:background1;padding:0in 5.4pt 0in 5.4pt;
    height:2.7pt'>
    <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
    normal'><b><span lang=EN-US style='font-size:9.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi;color:black;mso-color-alt:windowtext'>Semester <span
    class=GramE>Two:-</span> <span style='mso-spacerun:yes'>�</span>July 2021 �
    November 2021</span></b><b><span lang=EN-US style='font-size:9.0pt;
    font-family:"Times New Roman",serif;mso-ascii-theme-font:major-bidi;
    mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'><o:p></o:p></span></b></p>
    </td>
   </tr>
   <tr style='mso-yfti-irow:1;height:8.05pt'>
    <td width=61 valign=top style='width:45.75pt;border:solid windowtext 1.0pt;
    border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:
    solid windowtext .5pt;background:#D9D9D9;mso-background-themecolor:background1;
    mso-background-themeshade:217;padding:0in 5.4pt 0in 5.4pt;height:8.05pt'>
    <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
    normal'><span lang=EN-US style='font-size:9.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi;color:black;mso-color-alt:windowtext'>Code</span><span
    lang=EN-US style='font-size:9.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi'><o:p></o:p></span></p>
    </td>
    <td width=40 valign=top style='width:29.75pt;border-top:none;border-left:
    none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
    mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
    mso-border-alt:solid windowtext .5pt;background:#D9D9D9;mso-background-themecolor:
    background1;mso-background-themeshade:217;padding:0in 5.4pt 0in 5.4pt;
    height:8.05pt'>
    <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
    normal'><span class=SpellE><span lang=EN-US style='font-size:9.0pt;
    font-family:"Times New Roman",serif;mso-ascii-theme-font:major-bidi;
    mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi;color:black;
    mso-color-alt:windowtext'>Cr.H</span></span><span lang=EN-US
    style='font-size:9.0pt;font-family:"Times New Roman",serif;mso-ascii-theme-font:
    major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'><o:p></o:p></span></p>
    </td>
    <td width=189 valign=top style='width:141.55pt;border-top:none;border-left:
    none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
    mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
    mso-border-alt:solid windowtext .5pt;background:#D9D9D9;mso-background-themecolor:
    background1;mso-background-themeshade:217;padding:0in 5.4pt 0in 5.4pt;
    height:8.05pt'>
    <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
    normal'><span lang=EN-US style='font-size:9.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi;color:black;mso-color-alt:windowtext'>Subject</span><span
    lang=EN-US style='font-size:9.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi'><o:p></o:p></span></p>
    </td>
    <td width=47 valign=top style='width:35.3pt;border-top:none;border-left:
    none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
    mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
    mso-border-alt:solid windowtext .5pt;background:#D9D9D9;mso-background-themecolor:
    background1;mso-background-themeshade:217;padding:0in 5.4pt 0in 5.4pt;
    height:8.05pt'>
    <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
    normal'><span lang=EN-US style='font-size:9.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi;color:black;mso-color-alt:windowtext'>Grade</span><span
    lang=EN-US style='font-size:9.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi'><o:p></o:p></span></p>
    </td>
    <td width=66 valign=top style='width:49.25pt;border-top:none;border-left:
    none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
    mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
    mso-border-alt:solid windowtext .5pt;background:#D9D9D9;mso-background-themecolor:
    background1;mso-background-themeshade:217;padding:0in 5.4pt 0in 5.4pt;
    height:8.05pt'>
    <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
    normal'><span lang=EN-US style='font-size:9.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi;color:black;mso-color-alt:windowtext'>Code</span><span
    lang=EN-US style='font-size:9.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi'><o:p></o:p></span></p>
    </td>
    <td width=42 valign=top style='width:31.45pt;border-top:none;border-left:
    none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
    mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
    mso-border-alt:solid windowtext .5pt;background:#D9D9D9;mso-background-themecolor:
    background1;mso-background-themeshade:217;padding:0in 5.4pt 0in 5.4pt;
    height:8.05pt'>
    <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
    normal'><span class=SpellE><span lang=EN-US style='font-size:9.0pt;
    font-family:"Times New Roman",serif;mso-ascii-theme-font:major-bidi;
    mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi;color:black;
    mso-color-alt:windowtext'>Cr.H</span></span><span lang=EN-US
    style='font-size:9.0pt;font-family:"Times New Roman",serif;mso-ascii-theme-font:
    major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'><o:p></o:p></span></p>
    </td>
    <td width=131 valign=top style='width:97.95pt;border-top:none;border-left:
    none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
    mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
    mso-border-alt:solid windowtext .5pt;background:#D9D9D9;mso-background-themecolor:
    background1;mso-background-themeshade:217;padding:0in 5.4pt 0in 5.4pt;
    height:8.05pt'>
    <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
    normal'><span lang=EN-US style='font-size:9.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi;color:black;mso-color-alt:windowtext'>Subject</span><span
    lang=EN-US style='font-size:9.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi'><o:p></o:p></span></p>
    </td>
    <td width=48 valign=top style='width:.5in;border-top:none;border-left:none;
    border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
    mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
    mso-border-alt:solid windowtext .5pt;background:#D9D9D9;mso-background-themecolor:
    background1;mso-background-themeshade:217;padding:0in 5.4pt 0in 5.4pt;
    height:8.05pt'>
    <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
    normal'><span lang=EN-US style='font-size:9.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi;color:black;mso-color-alt:windowtext'>Grade</span><span
    lang=EN-US style='font-size:9.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi'><o:p></o:p></span></p>
    </td>
   </tr>
   <tr style='mso-yfti-irow:2'>
    <td width=61 valign=top style='width:45.75pt;border:solid windowtext 1.0pt;
    border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:
    solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
    <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
    normal'><span lang=EN-US style='font-size:8.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi'>MSAI01</span><span lang=EN-US> </span><span lang=EN-US
    style='font-size:8.0pt;font-family:"Times New Roman",serif;mso-ascii-theme-font:
    major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'><o:p></o:p></span></p>
    </td>
    <td width=40 valign=top style='width:29.75pt;border-top:none;border-left:
    none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
    mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
    mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
    <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
    line-height:normal'><span lang=EN-US style='font-size:8.0pt;font-family:
    "Times New Roman",serif;mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:
    major-bidi;mso-bidi-theme-font:major-bidi'>3<o:p></o:p></span></p>
    </td>
    <td width=189 valign=top style='width:141.55pt;border-top:none;border-left:
    none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
    mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
    mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
    <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
    normal;background:white;mso-background-themecolor:background1'><span
    lang=EN-US style='font-size:8.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi;color:black;mso-color-alt:windowtext'>Advance Artificial
    Intelligence</span><span lang=EN-US style='font-size:8.0pt;font-family:
    "Times New Roman",serif;mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:
    major-bidi;mso-bidi-theme-font:major-bidi'><o:p></o:p></span></p>
    </td>
    <td width=47 valign=top style='width:35.3pt;border-top:none;border-left:
    none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
    mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
    mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
    <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
    normal;background:white;mso-background-themecolor:background1'><span
    lang=EN-US style='font-size:8.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi;color:black;mso-color-alt:windowtext'>C+</span><span lang=EN-US
    style='font-size:8.0pt;font-family:"Times New Roman",serif;mso-ascii-theme-font:
    major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'><o:p></o:p></span></p>
    </td>
    <td width=66 valign=top style='width:49.25pt;border-top:none;border-left:
    none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
    mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
    mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
    <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
    normal;background:white;mso-background-themecolor:background1'><span
    lang=EN-US style='font-size:8.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi;color:black;mso-color-alt:windowtext'>MSCS01</span><span
    lang=EN-US style='font-size:8.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi'><o:p></o:p></span></p>
    </td>
    <td width=42 valign=top style='width:31.45pt;border-top:none;border-left:
    none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
    mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
    mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
    <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
    line-height:normal;background:white;mso-background-themecolor:background1'><span
    lang=EN-US style='font-size:8.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi;color:black;mso-color-alt:windowtext'>3</span><span lang=EN-US
    style='font-size:8.0pt;font-family:"Times New Roman",serif;mso-ascii-theme-font:
    major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'><o:p></o:p></span></p>
    </td>
    <td width=131 valign=top style='width:97.95pt;border-top:none;border-left:
    none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
    mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
    mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
    <p class=MsoNormal style='margin-bottom:0in;line-height:normal;background:
    white;mso-background-themecolor:background1'><span lang=EN-US
    style='font-size:8.0pt;font-family:"Times New Roman",serif;mso-ascii-theme-font:
    major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi;
    color:black;mso-color-alt:windowtext'>Theory of Computing</span><span
    lang=EN-US style='font-size:8.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi'><o:p></o:p></span></p>
    </td>
    <td width=48 valign=top style='width:.5in;border-top:none;border-left:none;
    border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
    mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
    mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
    <p class=MsoNormal style='margin-bottom:0in;line-height:normal;background:
    white;mso-background-themecolor:background1'><span lang=EN-US
    style='font-size:8.0pt;font-family:"Times New Roman",serif;mso-ascii-theme-font:
    major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi;
    color:black;mso-color-alt:windowtext'>B</span><span lang=EN-US
    style='font-size:8.0pt;font-family:"Times New Roman",serif;mso-ascii-theme-font:
    major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'><o:p></o:p></span></p>
    </td>
   </tr>
   <tr style='mso-yfti-irow:3'>
    <td width=61 valign=top style='width:45.75pt;border:solid windowtext 1.0pt;
    border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:
    solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
    <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
    normal'><span lang=EN-US style='font-size:8.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi'>MSAI02<o:p></o:p></span></p>
    </td>
    <td width=40 valign=top style='width:29.75pt;border-top:none;border-left:
    none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
    mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
    mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
    <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
    line-height:normal'><span lang=EN-US style='font-size:8.0pt;font-family:
    "Times New Roman",serif;mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:
    major-bidi;mso-bidi-theme-font:major-bidi'>3<o:p></o:p></span></p>
    </td>
    <td width=189 valign=top style='width:141.55pt;border-top:none;border-left:
    none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
    mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
    mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
    <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
    normal;background:white;mso-background-themecolor:background1'><span
    lang=EN-US style='font-size:8.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi;color:black;mso-color-alt:windowtext'>Decision Support System</span><span
    lang=EN-US style='font-size:8.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi'><o:p></o:p></span></p>
    </td>
    <td width=47 valign=top style='width:35.3pt;border-top:none;border-left:
    none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
    mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
    mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
    <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
    normal;background:white;mso-background-themecolor:background1'><span
    lang=EN-US style='font-size:8.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi;color:black;mso-color-alt:windowtext'>C+</span><span lang=EN-US
    style='font-size:8.0pt;font-family:"Times New Roman",serif;mso-ascii-theme-font:
    major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'><o:p></o:p></span></p>
    </td>
    <td width=66 valign=top style='width:49.25pt;border:none;mso-border-left-alt:
    solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
    <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
    normal;background:white;mso-background-themecolor:background1'><span
    lang=EN-US style='font-size:8.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi'><o:p>&nbsp;</o:p></span></p>
    </td>
    <td width=42 valign=top style='width:31.45pt;border:none;padding:0in 5.4pt 0in 5.4pt'>
    <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
    line-height:normal;background:white;mso-background-themecolor:background1'><span
    lang=EN-US style='font-size:9.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi'><o:p>&nbsp;</o:p></span></p>
    </td>
    <td width=131 valign=top style='width:97.95pt;border:none;padding:0in 5.4pt 0in 5.4pt'>
    <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
    normal;background:white;mso-background-themecolor:background1'><span
    lang=EN-US style='font-size:9.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi'><o:p>&nbsp;</o:p></span></p>
    </td>
    <td width=48 valign=top style='width:.5in;border:none;padding:0in 5.4pt 0in 5.4pt'>
    <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
    normal;background:white;mso-background-themecolor:background1'><span
    lang=EN-US style='font-size:9.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi'><o:p>&nbsp;</o:p></span></p>
    </td>
   </tr>
   <tr style='mso-yfti-irow:4;mso-yfti-lastrow:yes'>
    <td width=61 valign=top style='width:45.75pt;border:solid windowtext 1.0pt;
    border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:
    solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
    <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
    normal'><span lang=EN-US style='font-size:8.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi'>MSAI03<o:p></o:p></span></p>
    </td>
    <td width=40 valign=top style='width:29.75pt;border-top:none;border-left:
    none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
    mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
    mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
    <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
    line-height:normal'><span lang=EN-US style='font-size:8.0pt;font-family:
    "Times New Roman",serif;mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:
    major-bidi;mso-bidi-theme-font:major-bidi'>3<o:p></o:p></span></p>
    </td>
    <td width=189 valign=top style='width:141.55pt;border-top:none;border-left:
    none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
    mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
    mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
    <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
    normal;background:white;mso-background-themecolor:background1'><span
    lang=EN-US style='font-size:8.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi;color:black;mso-color-alt:windowtext'>Information Retrieval</span><span
    lang=EN-US style='font-size:8.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi'><o:p></o:p></span></p>
    </td>
    <td width=47 valign=top style='width:35.3pt;border-top:none;border-left:
    none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
    mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
    mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
    <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
    normal;background:white;mso-background-themecolor:background1'><span
    lang=EN-US style='font-size:8.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi;color:black;mso-color-alt:windowtext'>B</span><span lang=EN-US
    style='font-size:8.0pt;font-family:"Times New Roman",serif;mso-ascii-theme-font:
    major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'><o:p></o:p></span></p>
    </td>
    <td width=66 valign=top style='width:49.25pt;border:none;mso-border-left-alt:
    solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
    <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
    normal;background:white;mso-background-themecolor:background1'><span
    lang=EN-US style='font-size:8.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi'><o:p>&nbsp;</o:p></span></p>
    </td>
    <td width=42 valign=top style='width:31.45pt;border:none;padding:0in 5.4pt 0in 5.4pt'>
    <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
    line-height:normal;background:white;mso-background-themecolor:background1'><span
    lang=EN-US style='font-size:9.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi'><o:p>&nbsp;</o:p></span></p>
    </td>
    <td width=131 valign=top style='width:97.95pt;border:none;padding:0in 5.4pt 0in 5.4pt'>
    <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
    normal;background:white;mso-background-themecolor:background1'><span
    lang=EN-US style='font-size:9.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi'><o:p>&nbsp;</o:p></span></p>
    </td>
    <td width=48 valign=top style='width:.5in;border:none;padding:0in 5.4pt 0in 5.4pt'>
    <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
    normal;background:white;mso-background-themecolor:background1'><span
    lang=EN-US style='font-size:9.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi'><o:p>&nbsp;</o:p></span></p>
    </td>
   </tr>
  </table>
  <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
  normal'><span lang=EN-US style='font-size:9.0pt;font-family:"Times New Roman",serif;
  mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
  major-bidi;color:black;mso-color-alt:windowtext'><span
  style='mso-spacerun:yes'>����������������������������������������������������������������������������������������������������������������
  </span><span style='mso-spacerun:yes'>�����</span><span
  style='mso-spacerun:yes'>�</span><span class=GramE>GPA:-</span> 2.75<span
  style='mso-spacerun:yes'>����������������� </span>CGPA:- 2.50</span><span
  lang=EN-US style='font-size:9.0pt;font-family:"Times New Roman",serif;
  mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
  major-bidi'><o:p></o:p></span></p>
  <table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0 width=623
   style='width:467.3pt;border-collapse:collapse;border:none;mso-border-alt:
   solid windowtext .5pt;mso-yfti-tbllook:1184;mso-padding-alt:0in 5.4pt 0in 5.4pt'>
   <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;height:.1in'>
    <td width=623 colspan=8 valign=top style='width:467.3pt;border:none;
    border-bottom:solid windowtext 1.0pt;mso-border-bottom-alt:solid windowtext .5pt;
    background:white;mso-background-themecolor:background1;padding:0in 5.4pt 0in 5.4pt;
    height:.1in'>
    <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
    normal'><b><span lang=EN-US style='font-size:9.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi;color:black;mso-color-alt:windowtext'>Semester <span
    class=GramE>Three:-</span> November 2021 � March 2022</span></b><b><span
    lang=EN-US style='font-size:9.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi'><o:p></o:p></span></b></p>
    </td>
   </tr>
   <tr style='mso-yfti-irow:1;height:8.5pt'>
    <td width=59 valign=top style='width:44.0pt;border:solid windowtext 1.0pt;
    border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:
    solid windowtext .5pt;background:#D9D9D9;mso-background-themecolor:background1;
    mso-background-themeshade:217;padding:0in 5.4pt 0in 5.4pt;height:8.5pt'>
    <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
    normal'><span lang=EN-US style='font-size:9.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi;color:black;mso-color-alt:windowtext'>Code</span><span
    lang=EN-US style='font-size:9.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi'><o:p></o:p></span></p>
    </td>
    <td width=42 valign=top style='width:31.5pt;border-top:none;border-left:
    none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
    mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
    mso-border-alt:solid windowtext .5pt;background:#D9D9D9;mso-background-themecolor:
    background1;mso-background-themeshade:217;padding:0in 5.4pt 0in 5.4pt;
    height:8.5pt'>
    <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
    normal'><span class=SpellE><span lang=EN-US style='font-size:9.0pt;
    font-family:"Times New Roman",serif;mso-ascii-theme-font:major-bidi;
    mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi;color:black;
    mso-color-alt:windowtext'>Cr.H</span></span><span lang=EN-US
    style='font-size:9.0pt;font-family:"Times New Roman",serif;mso-ascii-theme-font:
    major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'><o:p></o:p></span></p>
    </td>
    <td width=192 valign=top style='width:2.0in;border-top:none;border-left:
    none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
    mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
    mso-border-alt:solid windowtext .5pt;background:#D9D9D9;mso-background-themecolor:
    background1;mso-background-themeshade:217;padding:0in 5.4pt 0in 5.4pt;
    height:8.5pt'>
    <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
    normal'><span lang=EN-US style='font-size:9.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi;color:black;mso-color-alt:windowtext'>Subject</span><span
    lang=EN-US style='font-size:9.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi'><o:p></o:p></span></p>
    </td>
    <td width=48 valign=top style='width:.5in;border-top:none;border-left:none;
    border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
    mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
    mso-border-alt:solid windowtext .5pt;background:#D9D9D9;mso-background-themecolor:
    background1;mso-background-themeshade:217;padding:0in 5.4pt 0in 5.4pt;
    height:8.5pt'>
    <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
    normal'><span lang=EN-US style='font-size:9.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi;color:black;mso-color-alt:windowtext'>Grade</span><span
    lang=EN-US style='font-size:9.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi'><o:p></o:p></span></p>
    </td>
    <td width=60 valign=top style='width:45.0pt;border-top:none;border-left:
    none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
    mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
    mso-border-alt:solid windowtext .5pt;background:#D9D9D9;mso-background-themecolor:
    background1;mso-background-themeshade:217;padding:0in 5.4pt 0in 5.4pt;
    height:8.5pt'>
    <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
    normal'><span lang=EN-US style='font-size:9.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi;color:black;mso-color-alt:windowtext'>Code</span><span
    lang=EN-US style='font-size:9.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi'><o:p></o:p></span></p>
    </td>
    <td width=42 valign=top style='width:31.5pt;border-top:none;border-left:
    none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
    mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
    mso-border-alt:solid windowtext .5pt;background:#D9D9D9;mso-background-themecolor:
    background1;mso-background-themeshade:217;padding:0in 5.4pt 0in 5.4pt;
    height:8.5pt'>
    <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
    normal'><span class=SpellE><span lang=EN-US style='font-size:9.0pt;
    font-family:"Times New Roman",serif;mso-ascii-theme-font:major-bidi;
    mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi;color:black;
    mso-color-alt:windowtext'>Cr.H</span></span><span lang=EN-US
    style='font-size:9.0pt;font-family:"Times New Roman",serif;mso-ascii-theme-font:
    major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'><o:p></o:p></span></p>
    </td>
    <td width=132 valign=top style='width:99.0pt;border-top:none;border-left:
    none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
    mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
    mso-border-alt:solid windowtext .5pt;background:#D9D9D9;mso-background-themecolor:
    background1;mso-background-themeshade:217;padding:0in 5.4pt 0in 5.4pt;
    height:8.5pt'>
    <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
    normal'><span lang=EN-US style='font-size:9.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi;color:black;mso-color-alt:windowtext'>Subject</span><span
    lang=EN-US style='font-size:9.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi'><o:p></o:p></span></p>
    </td>
    <td width=48 valign=top style='width:36.3pt;border-top:none;border-left:
    none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
    mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
    mso-border-alt:solid windowtext .5pt;background:#D9D9D9;mso-background-themecolor:
    background1;mso-background-themeshade:217;padding:0in 5.4pt 0in 5.4pt;
    height:8.5pt'>
    <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
    normal'><span lang=EN-US style='font-size:9.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi;color:black;mso-color-alt:windowtext'>Grade</span><span
    lang=EN-US style='font-size:9.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi'><o:p></o:p></span></p>
    </td>
   </tr>
   <tr style='mso-yfti-irow:2;height:10.6pt'>
    <td width=59 valign=top style='width:44.0pt;border:solid windowtext 1.0pt;
    border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:
    solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:10.6pt'>
    <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
    normal'><span lang=EN-US style='font-size:8.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi'>POCI300<o:p></o:p></span></p>
    </td>
    <td width=42 valign=top style='width:31.5pt;border-top:none;border-left:
    none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
    mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
    mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;
    height:10.6pt'>
    <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
    line-height:normal'><span lang=EN-US style='font-size:8.0pt;font-family:
    "Times New Roman",serif;mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:
    major-bidi;mso-bidi-theme-font:major-bidi'>3<o:p></o:p></span></p>
    </td>
    <td width=192 valign=top style='width:2.0in;border-top:none;border-left:
    none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
    mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
    mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;
    height:10.6pt'>
    <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
    normal;background:white;mso-background-themecolor:background1'><span
    lang=EN-US style='font-size:8.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi;color:black;mso-color-alt:windowtext'>Machine Learning</span><span
    lang=EN-US style='font-size:8.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi'><o:p></o:p></span></p>
    </td>
    <td width=48 valign=top style='width:.5in;border-top:none;border-left:none;
    border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
    mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
    mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;
    height:10.6pt'>
    <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
    normal;background:white;mso-background-themecolor:background1'><span
    lang=EN-US style='font-size:8.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi;color:black;mso-color-alt:windowtext'>C</span><span lang=EN-US
    style='font-size:8.0pt;font-family:"Times New Roman",serif;mso-ascii-theme-font:
    major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'><o:p></o:p></span></p>
    </td>
    <td width=60 valign=top style='width:45.0pt;border-top:none;border-left:
    none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
    mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
    mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;
    height:10.6pt'>
    <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
    normal;background:white;mso-background-themecolor:background1'><span
    lang=EN-US style='font-size:8.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi;color:black;mso-color-alt:windowtext'>POCI500</span><span
    lang=EN-US style='font-size:8.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi'><o:p></o:p></span></p>
    </td>
    <td width=42 valign=top style='width:31.5pt;border-top:none;border-left:
    none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
    mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
    mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;
    height:10.6pt'>
    <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
    line-height:normal;background:white;mso-background-themecolor:background1'><span
    lang=EN-US style='font-size:8.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi;color:black;mso-color-alt:windowtext'>3</span><span lang=EN-US
    style='font-size:8.0pt;font-family:"Times New Roman",serif;mso-ascii-theme-font:
    major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'><o:p></o:p></span></p>
    </td>
    <td width=132 valign=top style='width:99.0pt;border-top:none;border-left:
    none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
    mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
    mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;
    height:10.6pt'>
    <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
    normal;background:white;mso-background-themecolor:background1'><span
    lang=EN-US style='font-size:8.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi;color:black;mso-color-alt:windowtext'>Robotics And Intelligent
    Systems</span><span lang=EN-US style='font-size:8.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi'><o:p></o:p></span></p>
    </td>
    <td width=48 valign=top style='width:36.3pt;border-top:none;border-left:
    none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
    mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
    mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;
    height:10.6pt'>
    <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
    normal;background:white;mso-background-themecolor:background1'><span
    lang=EN-US style='font-size:8.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi;color:black;mso-color-alt:windowtext'>C</span><span lang=EN-US
    style='font-size:8.0pt;font-family:"Times New Roman",serif;mso-ascii-theme-font:
    major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'><o:p></o:p></span></p>
    </td>
   </tr>
   <tr style='mso-yfti-irow:3;height:4.45pt'>
    <td width=59 valign=top style='width:44.0pt;border:solid windowtext 1.0pt;
    border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:
    solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:4.45pt'>
    <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
    normal'><span lang=EN-US style='font-size:8.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi'>POCI400<o:p></o:p></span></p>
    </td>
    <td width=42 valign=top style='width:31.5pt;border-top:none;border-left:
    none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
    mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
    mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;
    height:4.45pt'>
    <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
    line-height:normal'><span lang=EN-US style='font-size:8.0pt;font-family:
    "Times New Roman",serif;mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:
    major-bidi;mso-bidi-theme-font:major-bidi'>3<o:p></o:p></span></p>
    </td>
    <td width=192 valign=top style='width:2.0in;border-top:none;border-left:
    none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
    mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
    mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;
    height:4.45pt'>
    <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
    normal;background:white;mso-background-themecolor:background1'><span
    lang=EN-US style='font-size:8.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi;color:black;mso-color-alt:windowtext'>Natural Language
    Processing</span><span lang=EN-US style='font-size:8.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi'><o:p></o:p></span></p>
    </td>
    <td width=48 valign=top style='width:.5in;border-top:none;border-left:none;
    border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
    mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
    mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;
    height:4.45pt'>
    <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
    normal;background:white;mso-background-themecolor:background1'><span
    lang=EN-US style='font-size:8.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi;color:black;mso-color-alt:windowtext'>C+</span><span lang=EN-US
    style='font-size:8.0pt;font-family:"Times New Roman",serif;mso-ascii-theme-font:
    major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'><o:p></o:p></span></p>
    </td>
    <td width=60 valign=top style='width:45.0pt;border:none;mso-border-left-alt:
    solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:4.45pt'>
    <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
    normal;background:white;mso-background-themecolor:background1'><span
    lang=EN-US style='font-size:8.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi'><o:p>&nbsp;</o:p></span></p>
    </td>
    <td width=42 valign=top style='width:31.5pt;border:none;padding:0in 5.4pt 0in 5.4pt;
    height:4.45pt'>
    <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
    line-height:normal;background:white;mso-background-themecolor:background1'><span
    lang=EN-US style='font-size:8.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi'><o:p>&nbsp;</o:p></span></p>
    </td>
    <td width=132 valign=top style='width:99.0pt;border:none;padding:0in 5.4pt 0in 5.4pt;
    height:4.45pt'>
    <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
    normal;background:white;mso-background-themecolor:background1'><span
    lang=EN-US style='font-size:8.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi'><o:p>&nbsp;</o:p></span></p>
    </td>
    <td width=48 valign=top style='width:36.3pt;border:none;padding:0in 5.4pt 0in 5.4pt;
    height:4.45pt'>
    <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
    normal;background:white;mso-background-themecolor:background1'><span
    lang=EN-US style='font-size:9.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi'><o:p>&nbsp;</o:p></span></p>
    </td>
   </tr>
   <tr style='mso-yfti-irow:4;height:12.95pt'>
    <td width=623 colspan=8 valign=top style='width:467.3pt;border:none;
    background:white;mso-background-themecolor:background1;padding:0in 5.4pt 0in 5.4pt;
    height:12.95pt'>
    <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
    normal;background:white;mso-background-themecolor:background1'><span
    lang=EN-US style='font-size:9.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi;color:black;mso-color-alt:windowtext'><span
    style='mso-spacerun:yes'>�����������������������������������������������������������������������������������������������������������
    </span><span style='mso-spacerun:yes'>�</span><span
    style='mso-spacerun:yes'>��������</span><span
    style='mso-spacerun:yes'>�</span><span style='mso-spacerun:yes'>�</span><span
    class=GramE>GPA:-</span> 2.17<span
    style='mso-spacerun:yes'>���������������� </span>CGPA:- 2.41</span><span
    lang=EN-US style='font-size:9.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi'><o:p></o:p></span></p>
    </td>
   </tr>
   <tr style='mso-yfti-irow:5;height:12.95pt'>
    <td width=623 colspan=8 valign=top style='width:467.3pt;border:none;
    background:white;mso-background-themecolor:background1;padding:0in 5.4pt 0in 5.4pt;
    height:12.95pt'>
    <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
    normal'><b><span lang=EN-US style='font-size:9.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi;color:black;mso-color-alt:windowtext'>Semester <span
    class=GramE>Four:-</span> May 2022 � March 2024</span></b><b><span
    lang=EN-US style='font-size:9.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi'><o:p></o:p></span></b></p>
    </td>
   </tr>
   <tr style='mso-yfti-irow:6;height:8.5pt'>
    <td width=59 valign=top style='width:44.0pt;border:solid windowtext 1.0pt;
    mso-border-alt:solid windowtext .5pt;background:#D9D9D9;mso-background-themecolor:
    background1;mso-background-themeshade:217;padding:0in 5.4pt 0in 5.4pt;
    height:8.5pt'>
    <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
    normal'><span lang=EN-US style='font-size:9.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi;color:black;mso-color-alt:windowtext'>Code</span><span
    lang=EN-US style='font-size:9.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi'><o:p></o:p></span></p>
    </td>
    <td width=42 valign=top style='width:31.5pt;border:solid windowtext 1.0pt;
    border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
    solid windowtext .5pt;background:#D9D9D9;mso-background-themecolor:background1;
    mso-background-themeshade:217;padding:0in 5.4pt 0in 5.4pt;height:8.5pt'>
    <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
    normal'><span class=SpellE><span lang=EN-US style='font-size:9.0pt;
    font-family:"Times New Roman",serif;mso-ascii-theme-font:major-bidi;
    mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi;color:black;
    mso-color-alt:windowtext'>Cr.H</span></span><span lang=EN-US
    style='font-size:9.0pt;font-family:"Times New Roman",serif;mso-ascii-theme-font:
    major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'><o:p></o:p></span></p>
    </td>
    <td width=192 valign=top style='width:2.0in;border:solid windowtext 1.0pt;
    border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
    solid windowtext .5pt;background:#D9D9D9;mso-background-themecolor:background1;
    mso-background-themeshade:217;padding:0in 5.4pt 0in 5.4pt;height:8.5pt'>
    <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
    normal'><span lang=EN-US style='font-size:9.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi;color:black;mso-color-alt:windowtext'>Subject</span><span
    lang=EN-US style='font-size:9.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi'><o:p></o:p></span></p>
    </td>
    <td width=48 valign=top style='width:.5in;border:solid windowtext 1.0pt;
    border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
    solid windowtext .5pt;background:#D9D9D9;mso-background-themecolor:background1;
    mso-background-themeshade:217;padding:0in 5.4pt 0in 5.4pt;height:8.5pt'>
    <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
    normal'><span lang=EN-US style='font-size:9.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi;color:black;mso-color-alt:windowtext'>Grade</span><span
    lang=EN-US style='font-size:9.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi'><o:p></o:p></span></p>
    </td>
    <td width=60 valign=top style='width:45.0pt;border:none;mso-border-left-alt:
    solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:8.5pt'>
    <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
    normal'><span lang=EN-US style='font-size:9.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi'><o:p>&nbsp;</o:p></span></p>
    </td>
    <td width=42 valign=top style='width:31.5pt;border:none;padding:0in 5.4pt 0in 5.4pt;
    height:8.5pt'>
    <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
    normal'><span lang=EN-US style='font-size:9.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi'><o:p>&nbsp;</o:p></span></p>
    </td>
    <td width=132 valign=top style='width:99.0pt;border:none;padding:0in 5.4pt 0in 5.4pt;
    height:8.5pt'>
    <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
    normal'><span lang=EN-US style='font-size:9.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi'><o:p>&nbsp;</o:p></span></p>
    </td>
    <td width=48 valign=top style='width:36.3pt;border:none;padding:0in 5.4pt 0in 5.4pt;
    height:8.5pt'>
    <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
    normal'><span lang=EN-US style='font-size:9.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi'><o:p>&nbsp;</o:p></span></p>
    </td>
   </tr>
   <tr style='mso-yfti-irow:7;mso-yfti-lastrow:yes;height:10.6pt'>
    <td width=59 valign=top style='width:44.0pt;border:solid windowtext 1.0pt;
    border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:
    solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:10.6pt'>
    <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
    normal'><span lang=EN-US style='font-size:8.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi'>MSCP07<o:p></o:p></span></p>
    </td>
    <td width=42 valign=top style='width:31.5pt;border-top:none;border-left:
    none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
    mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
    mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;
    height:10.6pt'>
    <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
    line-height:normal'><span lang=EN-US style='font-size:8.0pt;font-family:
    "Times New Roman",serif;mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:
    major-bidi;mso-bidi-theme-font:major-bidi'>6<o:p></o:p></span></p>
    </td>
    <td width=192 valign=top style='width:2.0in;border-top:none;border-left:
    none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
    mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
    mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;
    height:10.6pt'>
    <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
    normal;background:white;mso-background-themecolor:background1'><span
    lang=EN-US style='font-size:8.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi;color:black;mso-color-alt:windowtext'>Master Project</span><span
    lang=EN-US style='font-size:8.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi'><o:p></o:p></span></p>
    </td>
    <td width=48 valign=top style='width:.5in;border-top:none;border-left:none;
    border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
    mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
    mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;
    height:10.6pt'>
    <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
    normal;background:white;mso-background-themecolor:background1'><span
    lang=EN-US style='font-size:8.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi;color:black;mso-color-alt:windowtext'>P</span><span lang=EN-US
    style='font-size:8.0pt;font-family:"Times New Roman",serif;mso-ascii-theme-font:
    major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'><o:p></o:p></span></p>
    </td>
    <td width=60 valign=top style='width:45.0pt;border:none;mso-border-left-alt:
    solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:10.6pt'>
    <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
    normal;background:white;mso-background-themecolor:background1'><span
    lang=EN-US style='font-size:8.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi'><o:p>&nbsp;</o:p></span></p>
    </td>
    <td width=42 valign=top style='width:31.5pt;border:none;padding:0in 5.4pt 0in 5.4pt;
    height:10.6pt'>
    <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
    line-height:normal;background:white;mso-background-themecolor:background1'><span
    lang=EN-US style='font-size:8.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi'><o:p>&nbsp;</o:p></span></p>
    </td>
    <td width=132 valign=top style='width:99.0pt;border:none;padding:0in 5.4pt 0in 5.4pt;
    height:10.6pt'>
    <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
    normal;background:white;mso-background-themecolor:background1'><span
    lang=EN-US style='font-size:8.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi'><o:p>&nbsp;</o:p></span></p>
    </td>
    <td width=48 valign=top style='width:36.3pt;border:none;padding:0in 5.4pt 0in 5.4pt;
    height:10.6pt'>
    <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
    normal;background:white;mso-background-themecolor:background1'><span
    lang=EN-US style='font-size:8.0pt;font-family:"Times New Roman",serif;
    mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
    major-bidi'><o:p>&nbsp;</o:p></span></p>
    </td>
   </tr>
  </table>
  <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
  normal'><span lang=EN-US style='font-size:9.0pt;font-family:"Times New Roman",serif;
  mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
  major-bidi'><o:p>&nbsp;</o:p></span></p>
  <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
  normal'><span lang=EN-US style='font-size:9.0pt;font-family:"Times New Roman",serif;
  mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
  major-bidi'><o:p>&nbsp;</o:p></span></p>
  <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
  normal'><span lang=EN-US style='font-size:9.0pt;font-family:"Times New Roman",serif;
  mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
  major-bidi'><o:p>&nbsp;</o:p></span></p>
  <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
  normal'><span lang=EN-US style='font-size:9.0pt;font-family:"Times New Roman",serif;
  mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
  major-bidi'><o:p>&nbsp;</o:p></span></p>
  <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
  normal'><span lang=EN-US style='font-size:9.0pt;font-family:"Times New Roman",serif;
  mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
  major-bidi'><o:p>&nbsp;</o:p></span></p>
  <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
  normal'><span lang=EN-US style='font-size:9.0pt;font-family:"Times New Roman",serif;
  mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
  major-bidi'><o:p>&nbsp;</o:p></span></p>
  <p class=MsoNormal style='margin-bottom:0in;line-height:normal'><span
  class=SpellE><b><span lang=EN-US style='font-size:10.0pt;font-family:"Times New Roman",serif;
  mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
  major-bidi;color:black;mso-color-alt:windowtext'>Ust</span></b></span><b><span
  lang=EN-US style='font-size:10.0pt;font-family:"Times New Roman",serif;
  mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
  major-bidi;color:black;mso-color-alt:windowtext'>. Kawther Abu <span
  class=SpellE>Elnaja</span><span
  style='mso-spacerun:yes'>��������������������������������������������������������������������
  </span>Dr. <span class=SpellE>Isameldeen</span> Mohmed Khair Mohmed</span></b><b><span
  lang=EN-US style='font-size:10.0pt;font-family:"Times New Roman",serif;
  mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
  major-bidi'><o:p></o:p></span></b></p>
  <p class=MsoNormal style='margin-bottom:0in;line-height:normal'><b><span
  lang=EN-US style='font-size:10.0pt;font-family:"Times New Roman",serif;
  mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
  major-bidi;color:black;mso-color-alt:windowtext'>The University
  Registrar<span
  style='mso-spacerun:yes'>�����������������������������������������������������������������������
  </span>Deputy President for Academic Affairs</span></b><span lang=EN-US
  style='font-size:10.0pt;font-family:"Times New Roman",serif;mso-ascii-theme-font:
  major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi;
  color:black;mso-color-alt:windowtext'><span style='mso-spacerun:yes'>�
  </span></span><span lang=EN-US style='font-size:10.0pt;font-family:"Times New Roman",serif;
  mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
  major-bidi'><o:p></o:p></span></p>
  <p class=MsoNormal style='margin-bottom:0in;line-height:normal'><span
  lang=EN-US style='font-size:10.0pt;font-family:"Times New Roman",serif;
  mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
  major-bidi'><o:p>&nbsp;</o:p></span></p>
  <p class=MsoNormal style='margin-bottom:0in;line-height:normal'><span
  lang=EN-US style='font-size:8.0pt;font-family:"Times New Roman",serif;
  mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
  major-bidi'><o:p>&nbsp;</o:p></span></p>
  <p class=MsoNormal style='margin-bottom:0in;line-height:normal'><span
  lang=EN-US style='font-size:8.0pt;font-family:"Times New Roman",serif;
  mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
  major-bidi'><o:p>&nbsp;</o:p></span></p>
  <p class=MsoNormal style='margin-bottom:0in;line-height:normal'><span
  lang=EN-US style='font-size:8.0pt;font-family:"Times New Roman",serif;
  mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
  major-bidi'><o:p>&nbsp;</o:p></span></p>
  <p class=MsoNormal style='margin-bottom:0in;line-height:normal'><span
  lang=EN-US style='font-size:8.0pt;font-family:"Times New Roman",serif;
  mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
  major-bidi'><o:p>&nbsp;</o:p></span></p>
  <p class=MsoNormal style='margin-bottom:0in;line-height:normal'><b><span
  lang=EN-US style='font-size:10.0pt;font-family:"Times New Roman",serif;
  mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
  major-bidi;color:black;mso-color-alt:windowtext'>Date of Issue: 31/08/2024.<span
  style='mso-spacerun:yes'>���� </span></span></b><b><span lang=EN-US
  style='font-size:10.0pt;font-family:"Times New Roman",serif;mso-ascii-theme-font:
  major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'><o:p></o:p></span></b></p>
  <p class=MsoNormal style='margin-bottom:0in;line-height:normal'><span
  lang=EN-US style='font-size:8.0pt;font-family:"Times New Roman",serif;
  mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
  major-bidi;color:black;mso-color-alt:windowtext'><span
  style='mso-spacerun:yes'>���� </span></span><span lang=EN-US
  style='font-size:8.0pt;font-family:"Times New Roman",serif;mso-ascii-theme-font:
  major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'><o:p></o:p></span></p>
  <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
  normal'><span lang=EN-US style='font-size:9.0pt;font-family:"Times New Roman",serif;
  mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
  major-bidi'><o:p>&nbsp;</o:p></span></p>
  <p class=MsoNormal style='margin-bottom:0in;text-align:justify;line-height:
  normal'><span lang=EN-US style='font-size:9.0pt;font-family:"Times New Roman",serif;
  mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
  major-bidi'><o:p>&nbsp;</o:p></span></p>
  </td>
 </tr>
</table>

<p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

</div>

</body>

</html>
