<?php include("include/functions.php");

if(isset($_GET['std'])){

    $std_index = $_GET['std'];
  
    $stud_index = Stud_Index($std_index);
  
    $student_profile_common = student_profile_common_sql($std_index);
    $current_sem = $student_profile_common['curr_sem'];
    $stud_transcript_sql = stud_transcript_sql($std_index, $current_sem);
    $total_hours = Total_Hours($std_index);
    stud_course_mark_sql($std_index, $batch, $major);
   $std_cert_data  = Get_std_cert_Data($std_index);
  
  }
// Function to retrieve the course name based on the course code
function Get_Course_Name($code) {
    global $sis_con;
    $sqli = "SELECT * FROM `course_details` WHERE `course_code` = '$code' ";
    $query = mysqli_query($sis_con, $sqli);
    $row = mysqli_fetch_array($query);
    return $row['course_name'];
}


?>

<html xmlns:v="urn:schemas-microsoft-com:vml"
    xmlns:o="urn:schemas-microsoft-com:office:office"
    xmlns:w="urn:schemas-microsoft-com:office:word"
    xmlns:m="http://schemas.microsoft.com/office/2004/12/omml"
    xmlns="http://www.w3.org/TR/REC-html40">

<head>
    <meta http-equiv=Content-Type
        content="text/html; charset=windows-1252">
    <meta name=ProgId
        content=Word.Document>
    <meta name=Generator
        content="Microsoft Word 15">
    <meta name=Originator
        content="Microsoft Word 15">
    <link rel=File-List
        href="New%20Microsoft%20Word%20Document_files/filelist.xml">
    <!--[if gte mso 9]><xml>
 <o:DocumentProperties>
  <o:Author>LENOVO</o:Author>
  <o:LastAuthor>Ghazi Abdull Omer</o:LastAuthor>
  <o:Revision>2</o:Revision>
  <o:TotalTime>9</o:TotalTime>
  <o:Created>2024-09-16T10:51:00Z</o:Created>
  <o:LastSaved>2024-09-16T10:51:00Z</o:LastSaved>
  <o:Pages>1</o:Pages>
  <o:Words>751</o:Words>
  <o:Characters>4286</o:Characters>
  <o:Lines>35</o:Lines>
  <o:Paragraphs>10</o:Paragraphs>
  <o:CharactersWithSpaces>5027</o:CharactersWithSpaces>
  <o:Version>16.00</o:Version>
 </o:DocumentProperties>
 <o:OfficeDocumentSettings>
  <o:AllowPNG/>
 </o:OfficeDocumentSettings>
</xml><![endif]-->
    <link rel=themeData
        href="New%20Microsoft%20Word%20Document_files/themedata.thmx">
    <link rel=colorSchemeMapping
        href="New%20Microsoft%20Word%20Document_files/colorschememapping.xml">
    <!--[if gte mso 9]><xml>
 <w:WordDocument>
  <w:Zoom>170</w:Zoom>
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
</xml><![endif]-->
    <!--[if gte mso 9]><xml>
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
    @font-face {
        font-family: "Cambria Math";
        panose-1: 2 4 5 3 5 4 6 3 2 4;
        mso-font-charset: 0;
        mso-generic-font-family: roman;
        mso-font-pitch: variable;
        mso-font-signature: -536869121 1107305727 33554432 0 415 0;
    }

    @font-face {
        font-family: Calibri;
        panose-1: 2 15 5 2 2 2 4 3 2 4;
        mso-font-charset: 0;
        mso-generic-font-family: swiss;
        mso-font-pitch: variable;
        mso-font-signature: -469750017 -1040178053 9 0 511 0;
    }

    /* Style Definitions */
    p.MsoNormal,
    li.MsoNormal,
    div.MsoNormal {
        mso-style-unhide: no;
        mso-style-qformat: yes;
        mso-style-parent: "";
        margin-top: 0in;
        margin-right: 0in;
        margin-bottom: 8.0pt;
        margin-left: 0in;
        line-height: 107%;
        mso-pagination: widow-orphan;
        font-size: 11.0pt;
        font-family: "Calibri", sans-serif;
        mso-ascii-font-family: Calibri;
        mso-ascii-theme-font: minor-latin;
        mso-fareast-font-family: Calibri;
        mso-fareast-theme-font: minor-latin;
        mso-hansi-font-family: Calibri;
        mso-hansi-theme-font: minor-latin;
        mso-bidi-font-family: Arial;
        mso-bidi-theme-font: minor-bidi;
        mso-font-kerning: 1.0pt;
        mso-ligatures: standardcontextual;
        mso-ansi-language: EN-US;
        mso-fareast-language: EN-US;
    }

    span.SpellE {
        mso-style-name: "";
        mso-spl-e: yes;
    }

    span.GramE {
        mso-style-name: "";
        mso-gram-e: yes;
    }

    .MsoChpDefault {
        mso-style-type: export-only;
        mso-default-props: yes;
        font-family: "Calibri", sans-serif;
        mso-ascii-font-family: Calibri;
        mso-ascii-theme-font: minor-latin;
        mso-fareast-font-family: Calibri;
        mso-fareast-theme-font: minor-latin;
        mso-hansi-font-family: Calibri;
        mso-hansi-theme-font: minor-latin;
        mso-bidi-font-family: Arial;
        mso-bidi-theme-font: minor-bidi;
        mso-ansi-language: EN-US;
        mso-fareast-language: EN-US;
    }

    .MsoPapDefault {
        mso-style-type: export-only;
        margin-bottom: 8.0pt;
        line-height: 107%;
    }

    @page WordSection1 {
        size: 8.5in 11.0in;
        margin: 4.5pt 1.0in 1.0in 1.0in;
        mso-header-margin: .5in;
        mso-footer-margin: .5in;
        mso-paper-source: 0;
    }

    div.WordSection1 {
        page: WordSection1;
    }
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
<![endif]-->
    <!--[if gte mso 9]><xml>
 <o:shapedefaults v:ext="edit" spidmax="1026"/>
</xml><![endif]-->
    <!--[if gte mso 9]><xml>
 <o:shapelayout v:ext="edit">
  <o:idmap v:ext="edit" data="1"/>
 </o:shapelayout></xml><![endif]-->
</head>

<body style='tab-interval:.5in;word-wrap:break-word'>

    <div class=WordSection1>

        <p class=MsoNormal><span lang=EN-US>
                <o:p>&nbsp;</o:p>
            </span></p>

        <p class=MsoNormal><span lang=EN-US>
                <o:p>&nbsp;</o:p>
            </span></p>

        <p class=MsoNormal><span lang=EN-US>
                <o:p>&nbsp;</o:p>
            </span></p>

        <p class=MsoNormal><span lang=EN-US>
                <o:p>&nbsp;</o:p>
            </span></p>

        <p class=MsoNormal><span lang=EN-US>
                <o:p>&nbsp;</o:p>
            </span></p>

        <p class=MsoNormal
            style='margin-bottom:0in'><span lang=EN-US
                style='font-size:
9.0pt;line-height:107%;font-family:"Times New Roman",serif;mso-ascii-theme-font:
major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'>National
                <span class=GramE>No:-</span><?php if(isset($student_profile_common)) echo $student_profile_common['identity_no']; else echo "" ;?><o:p></o:p></span></p>

        <p class=MsoNormal
            style='margin-bottom:0in'><span lang=EN-US
                style='font-size:
9.0pt;line-height:107%;font-family:"Times New Roman",serif;mso-ascii-theme-font:
major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'>University
                <span class=GramE>No:-</span><?php if(isset($student_profile_common)) echo $student_profile_common['identity_no']; else echo "" ;?><o:p></o:p></span></p>

        <p class=MsoNormal
            align=center
            style='text-align:center'><span lang=EN-US
                style='font-size:18.0pt;line-height:107%;font-family:"Times New Roman",serif;
mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
major-bidi'>
                <o:p>&nbsp;</o:p>
            </span></p>

        <p class=MsoNormal
            align=center
            style='text-align:center'><b><span lang=EN-US
                    style='font-size:15.0pt;line-height:107%;font-family:"Times New Roman",serif;
mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
major-bidi'> <?php  echo Get_Faculty_Name($student_profile_common['faculty_code']); ?> </u>
                    <o:p></o:p>
                </span></b></p>

        <p class=MsoNormal
            align=center
            style='text-align:center'><span lang=EN-US
                style='font-size:13.0pt;line-height:107%;font-family:"Times New Roman",serif;
mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
major-bidi'>
                <o:p>&nbsp;</o:p>
            </span></p>

        <p class=MsoNormal
            style='margin-bottom:0in;text-align:justify'><span lang=EN-US
                style='font-size:12.0pt;line-height:107%;font-family:"Times New Roman",serif;
mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
major-bidi'>This is to certify that</span><span lang=EN-US
                style='font-size:
13.0pt;line-height:107%;font-family:"Times New Roman",serif;mso-ascii-theme-font:
major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'>
                &nbsp;&nbsp;<u>/&nbsp;<span style='mso-spacerun:yes'><b><?php if(isset($stud_index)) echo $stud_index['stud_name'] . " " . $stud_index['stud_surname'] . " " . $stud_index['familyname'] ; else echo "";  ?></b></span>&nbsp;/</u> <b>
                    (<?php   

if($student_profile_common['nationality_code'] == 0){
  echo 'Foreign';
}
if($student_profile_common['nationality_code'] == 1){
  echo 'Sudanese Nationality';

}
if($student_profile_common['nationality_code'] == 4){
  echo 'Refugees';

}
?>
                    )</b> </span><span lang=EN-US
                style='font-size:12.0pt;line-height:
107%;font-family:"Times New Roman",serif;mso-ascii-theme-font:major-bidi;
mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'>has
                successfully passed the</span><span lang=EN-US
                style='font-size:13.0pt;
line-height:107%;font-family:"Times New Roman",serif;mso-ascii-theme-font:major-bidi;
mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'> <b><u>Administration</u></b></span><b><span lang=EN-US
                    style='font-size:9.0pt;line-height:107%;font-family:"Times New Roman",serif;
mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
major-bidi'> </span></b><b><span lang=EN-US
                    style='font-size:13.0pt;line-height:
107%;font-family:"Times New Roman",serif;mso-ascii-theme-font:major-bidi;
mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'><?php echo  Get_Mode($std_cert_data['mode']);?></span></b><span lang=EN-US
                style='font-size:12.0pt;line-height:107%;font-family:"Times New Roman",serif;
mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
major-bidi'>, by the senate of the university on the</span><span lang=EN-US
                style='font-size:13.0pt;line-height:107%;font-family:"Times New Roman",serif;
mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
major-bidi'> <b><span style='color:black;mso-color-alt:windowtext;background:
#D9D9D9;mso-shading-themecolor:background1;mso-shading-themeshade:217'><?php  echo Get_Format_Date($std_cert_data['senate_on']);  ?></span></b>. </span><span class=SpellE><span lang=EN-US
                    style='font-size:12.0pt;line-height:107%;font-family:"Times New Roman",serif;
mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
major-bidi'>He/She</span></span><span lang=EN-US
                style='font-size:12.0pt;
line-height:107%;font-family:"Times New Roman",serif;mso-ascii-theme-font:major-bidi;
mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'> has completed
                all the <b><?php //if(isset($total_hours)) echo $total_hours['unit']; else echo "" ;?> Credit Hours</b> of the program <b>(Full Time)</b> with <span class=GramE>a <span style='mso-spacerun:yes'>&nbsp;</span><b>CGPA</b></span><b>
                    /<?php if(isset($stud_transcript_sql)) echo $stud_transcript_sql['cgpa']; else echo "" ;?>/.</b>
                <o:p></o:p>
            </span></p>

        <p class=MsoNormal
            style='margin-bottom:0in;text-align:justify'><span lang=EN-US
                style='font-size:12.0pt;line-height:107%;font-family:"Times New Roman",serif;
mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
major-bidi'>Below are the details of his/her grades throughout the Ten
                semesters of the course of study.<o:p></o:p></span></p>

        <p class=MsoNormal
            style='margin-bottom:0in;text-align:justify'><span lang=EN-US
                style='font-size:8.0pt;line-height:107%;font-family:"Times New Roman",serif;
mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
major-bidi'>
                <o:p>&nbsp;</o:p>
            </span></p>
<?php







// Retrieve the maximum semester value (assuming we go up to semester 10)
$sem_sql = "SELECT MAX(curr_sem) AS newsem FROM `student_profile_common` WHERE `stud_id` = '201403018'";
$sem_query = mysqli_query($sis_con, $sem_sql);
$sem_res = mysqli_fetch_array($sem_query);
$newsem = $sem_res['newsem'];

// Loop through each semester (from 1 to the max semester found)
for ($i = 1; $i <= min(10, $newsem); $i++) {
    
    // Query to get courses for the current semester
    $sql_2 = "SELECT * FROM `stud_course_mark` cm 
              WHERE cm.batch = '2014' 
              AND cm.stud_id = '201403018' 
              AND `faculty_code` = '3' 
              AND `major_code` = '3' 
              AND cm.semester = $i  
              ORDER BY `semester` ASC";
    
    $query_2 = mysqli_query($sis_con, $sql_2);

    // Check if there are courses for the current semester
    if (mysqli_num_rows($query_2) > 0) {
        // Output semester title
        echo "
        
        <td width=624
                    colspan=8
                    valign=top
                    style='width:6.5in;border:none;border-bottom:
  solid windowtext 1.0pt;mso-border-bottom-alt:solid windowtext .5pt;
  background:white;mso-background-themecolor:background1;padding:0in 5.4pt 0in 5.4pt;
  height:13.0pt'>
                    <p class=MsoNormal
                        style='margin-bottom:0in;text-align:justify;line-height:
  normal'><b><span lang=EN-US
                                style='font-size:9.0pt;font-family:'Times New Roman',serif;
  mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
  major-bidi;color:black;mso-color-alt:windowtext'>Semester $i <span class=GramE>One:-</span>November
                                2017- February 2018</span></b><b><span lang=EN-US
                                style='font-size:9.0pt;
  font-family:'Times New Roman',serif;mso-ascii-theme-font:major-bidi;
  mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'>
                                <o:p></o:p>
                            </span></b></p>
                </td>
        
        ";

    
        
        // Start table for the semester
        echo "<table class=MsoTableGrid
            border=1
            cellspacing=0
            cellpadding=0
            style='border-collapse:collapse;border:none;mso-border-alt:solid windowtext .5pt;
 mso-yfti-tbllook:1184;mso-padding-alt:0in 5.4pt 0in 5.4pt'>";
        echo "<tr style='mso-yfti-irow:1;height:13.0pt'>";

        echo "<th style='font-size:8.0pt;font-family:'Times New Roman',serif;
  mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
  major-bidi;color:black;mso-color-alt:windowtext'>Code</th>";


        echo "<th style='font-size:8.0pt;
  font-family:'Times New Roman',serif;mso-ascii-theme-font:major-bidi;
  mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi;color:black;
  mso-color-alt:windowtext'>Cr.H</th>";


        echo "<th style='font-size:8.0pt;font-family:'Times New Roman',serif;
  mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
  major-bidi;color:black;mso-color-alt:windowtext'>Subject</th>";


        echo "<th style='font-size:8.0pt;font-family:'Times New Roman',serif;
  mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
  major-bidi;color:black;mso-color-alt:windowtext'>Grade</th>";


        echo "<th style='font-size:8.0pt;font-family:'Times New Roman',serif;
  mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
  major-bidi;color:black;mso-color-alt:windowtext'>Code</th>";


        echo "<th style='font-size:8.0pt;
  font-family:'Times New Roman',serif;mso-ascii-theme-font:major-bidi;
  mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi;color:black;
  mso-color-alt:windowtext'>Cr.H</th>";


        echo "<th style='font-size:8.0pt;font-family:'Times New Roman',serif;
  mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
  major-bidi;color:black;mso-color-alt:windowtext'>Subject</th>";

        echo "<th style='font-size:8.0pt;font-family:'Times New Roman',serif;
  mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
  major-bidi;color:black;mso-color-alt:windowtext'>Grade</th>";
        echo "</tr>";

        echo "<tbody>";

        $row_count = 0;

        // Display courses in pairs for the current semester
        while ($stud_res = mysqli_fetch_array($query_2)) {
            $CourseCode = $stud_res['course_code'];
            $CourseName = Get_Course_Name($stud_res['course_code']);
            $CRSLoad = $stud_res['weightage'];  // Credit Hours
            $Grade = $stud_res['grade'];
            
            // Pairing rows (2 subjects per row)
            if ($row_count % 2 == 0) {
                // Open a new row
                echo "<tr>";
            }
            
            // Display subject details
            echo "<td align='center'>" . $CourseCode . "</td>";
            echo "<td align='center'>" . $CRSLoad . "</td>";
            echo "<td align='left'>" . $CourseName . "</td>";
            echo "<td align='center'>" . $Grade . "</td>";

            $row_count++;

            if ($row_count % 2 == 0) {
                // Close the row after two courses
                echo "</tr>";
            }
        }

        // Close the last row if there is an odd number of subjects
        if ($row_count % 2 != 0) {
            echo "<td style = 'border:none;' colspan='4'></td></tr>"; // Empty cells for second column if odd number of courses
        }
        echo "</tbody>";
        // Retrieve GPA and CGPA for the current semester
        $sql = "SELECT * FROM `stud_transcript_table` WHERE `stud_id` = '201602018' and `semester` = '$i'";
        $query = mysqli_query($sis_con, $sql);
        $trans_res = mysqli_fetch_array($query);
        $gpa = $trans_res['gpa'];
        $cgpa = $trans_res['cgpa'];


        // Retrieve GPA and CGPA for the current semester from pre-fetched data


        // GPA and CGPA in the footer of the table
     
        echo "<tfoot>";
        echo "<tr>
                <td colspan='4'><strong>GPA: {$gpa}</strong></td>
                <td colspan='4'><strong>CGPA: {$cgpa}</strong></td>
              </tr>";
        echo "</tfoot>";

        // Display GPA and CGPA at the end of the table
        // echo "<tr>";
        // echo "<td style = 'border:none' colspan='4' align='center'><strong>GPA: $gpa</strong></td>";
        // echo "<td style = 'border:none' colspan='4' align='center'><strong>CGPA: $cgpa</strong></td>";
        // echo "</tr>";

        // End of the table for the current semester
        echo "</table><br>";
    }
}
?>
            
        <!-- table start ###########################################################################-->
        <!-- <table class=MsoTableGrid
            border=1
            cellspacing=0
            cellpadding=0
            style='border-collapse:collapse;border:none;mso-border-alt:solid windowtext .5pt;
 mso-yfti-tbllook:1184;mso-padding-alt:0in 5.4pt 0in 5.4pt'>

            <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;height:13.0pt'>

                <td width=624
                    colspan=8
                    valign=top
                    style='width:6.5in;border:none;border-bottom:
  solid windowtext 1.0pt;mso-border-bottom-alt:solid windowtext .5pt;
  background:white;mso-background-themecolor:background1;padding:0in 5.4pt 0in 5.4pt;
  height:13.0pt'>
                    <p class=MsoNormal
                        style='margin-bottom:0in;text-align:justify;line-height:
  normal'><b><span lang=EN-US
                                style='font-size:9.0pt;font-family:"Times New Roman",serif;
  mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
  major-bidi;color:black;mso-color-alt:windowtext'>Semester <span class=GramE>One:-</span>November
                                2017- February 2018</span></b><b><span lang=EN-US
                                style='font-size:9.0pt;
  font-family:"Times New Roman",serif;mso-ascii-theme-font:major-bidi;
  mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'>
                                <o:p></o:p>
                            </span></b></p>
                </td>


            </tr>


            <tr style='mso-yfti-irow:1;height:13.0pt'>

                <td width=62
                    valign=top
                    style='width:46.4pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  background:#D9D9D9;mso-background-themecolor:background1;mso-background-themeshade:
  217;padding:0in 5.4pt 0in 5.4pt;height:13.0pt'>
                    <p class=MsoNormal
                        style='margin-bottom:0in;text-align:justify;line-height:
  normal'><b><span lang=EN-US
                                style='font-size:8.0pt;font-family:"Times New Roman",serif;
  mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
  major-bidi;color:black;mso-color-alt:windowtext'>Code</span></b><b><span lang=EN-US
                                style='font-size:8.0pt;font-family:"Times New Roman",serif;
  mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
  major-bidi'>
                                <o:p></o:p>
                            </span></b></p>
                </td>
                <td width=38
                    valign=top
                    style='width:28.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:#D9D9D9;mso-background-themecolor:
  background1;mso-background-themeshade:217;padding:0in 5.4pt 0in 5.4pt;
  height:13.0pt'>
                    <p class=MsoNormal
                        style='margin-bottom:0in;text-align:justify;line-height:
  normal'><span class=SpellE><b><span lang=EN-US
                                    style='font-size:8.0pt;
  font-family:"Times New Roman",serif;mso-ascii-theme-font:major-bidi;
  mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi;color:black;
  mso-color-alt:windowtext'>Cr.H</span></b></span><b><span lang=EN-US
                                style='font-size:8.0pt;font-family:"Times New Roman",serif;mso-ascii-theme-font:
  major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'>
                                <o:p></o:p>
                            </span></b></p>
                </td>
                <td width=159
                    valign=top
                    style='width:118.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:#D9D9D9;mso-background-themecolor:
  background1;mso-background-themeshade:217;padding:0in 5.4pt 0in 5.4pt;
  height:13.0pt'>
                    <p class=MsoNormal
                        style='margin-bottom:0in;text-align:justify;line-height:
  normal'><b><span lang=EN-US
                                style='font-size:8.0pt;font-family:"Times New Roman",serif;
  mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
  major-bidi;color:black;mso-color-alt:windowtext'>Subject</span></b><b><span lang=EN-US
                                style='font-size:8.0pt;font-family:"Times New Roman",serif;
  mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
  major-bidi'>
                                <o:p></o:p>
                            </span></b></p>
                </td>
                <td width=48
                    valign=top
                    style='width:35.8pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:#D9D9D9;mso-background-themecolor:
  background1;mso-background-themeshade:217;padding:0in 5.4pt 0in 5.4pt;
  height:13.0pt'>
                    <p class=MsoNormal
                        style='margin-bottom:0in;text-align:justify;line-height:
  normal'><b><span lang=EN-US
                                style='font-size:8.0pt;font-family:"Times New Roman",serif;
  mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
  major-bidi;color:black;mso-color-alt:windowtext'>Grade</span></b><b><span lang=EN-US
                                style='font-size:8.0pt;font-family:"Times New Roman",serif;
  mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
  major-bidi'>
                                <o:p></o:p>
                            </span></b></p>
                </td>
                <td width=60
                    valign=top
                    style='width:44.7pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:#D9D9D9;mso-background-themecolor:
  background1;mso-background-themeshade:217;padding:0in 5.4pt 0in 5.4pt;
  height:13.0pt'>
                    <p class=MsoNormal
                        style='margin-bottom:0in;text-align:justify;line-height:
  normal'><b><span lang=EN-US
                                style='font-size:8.0pt;font-family:"Times New Roman",serif;
  mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
  major-bidi;color:black;mso-color-alt:windowtext'>Code</span></b><b><span lang=EN-US
                                style='font-size:8.0pt;font-family:"Times New Roman",serif;
  mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
  major-bidi'>
                                <o:p></o:p>
                            </span></b></p>
                </td>
                <td width=37
                    valign=top
                    style='width:28.1pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:#D9D9D9;mso-background-themecolor:
  background1;mso-background-themeshade:217;padding:0in 5.4pt 0in 5.4pt;
  height:13.0pt'>
                    <p class=MsoNormal
                        style='margin-bottom:0in;text-align:justify;line-height:
  normal'><span class=SpellE><b><span lang=EN-US
                                    style='font-size:8.0pt;
  font-family:"Times New Roman",serif;mso-ascii-theme-font:major-bidi;
  mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi;color:black;
  mso-color-alt:windowtext'>Cr.H</span></b></span><b><span lang=EN-US
                                style='font-size:8.0pt;font-family:"Times New Roman",serif;mso-ascii-theme-font:
  major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'>
                                <o:p></o:p>
                            </span></b></p>
                </td>
                <td width=177
                    valign=top
                    style='width:133.1pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:#D9D9D9;mso-background-themecolor:
  background1;mso-background-themeshade:217;padding:0in 5.4pt 0in 5.4pt;
  height:13.0pt'>
                    <p class=MsoNormal
                        style='margin-bottom:0in;text-align:justify;line-height:
  normal'><b><span lang=EN-US
                                style='font-size:8.0pt;font-family:"Times New Roman",serif;
  mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
  major-bidi;color:black;mso-color-alt:windowtext'>Subject</span></b><b><span lang=EN-US
                                style='font-size:8.0pt;font-family:"Times New Roman",serif;
  mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
  major-bidi'>
                                <o:p></o:p>
                            </span></b></p>
                </td>
                <td width=44
                    valign=top
                    style='width:32.8pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:#D9D9D9;mso-background-themecolor:
  background1;mso-background-themeshade:217;padding:0in 5.4pt 0in 5.4pt;
  height:13.0pt'>
                    <p class=MsoNormal
                        style='margin-bottom:0in;text-align:justify;line-height:
  normal'><b><span lang=EN-US
                                style='font-size:8.0pt;font-family:"Times New Roman",serif;
  mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
  major-bidi;color:black;mso-color-alt:windowtext'>Grade</span></b><b><span lang=EN-US
                                style='font-size:8.0pt;font-family:"Times New Roman",serif;
  mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
  major-bidi'>
                                <o:p></o:p>
                            </span></b></p>
                </td>
            </tr>
            <tr style='mso-yfti-irow:2'>
                <td width=62
                    valign=top
                    style='width:46.4pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0in 5.4pt 0in 5.4pt'>
                    <p class=MsoNormal
                        style='margin-bottom:0in;text-align:justify;line-height:
  normal'><span lang=EN-US
                            style='font-size:8.0pt;font-family:"Times New Roman",serif;
  mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
  major-bidi'>BABE501<o:p></o:p></span></p>
                </td>
                <td width=38
                    valign=top
                    style='width:28.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                    <p class=MsoNormal
                        align=center
                        style='margin-bottom:0in;text-align:center;
  line-height:normal'><span lang=EN-US
                            style='font-size:8.0pt;font-family:"Times New Roman",serif;
  mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
  major-bidi'>3<o:p></o:p></span></p>
                </td>
                <td width=159
                    valign=top
                    style='width:118.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                    <p class=MsoNormal
                        style='margin-bottom:0in;text-align:justify;line-height:
  normal;background:white;mso-background-themecolor:background1'><span lang=EN-US
                            style='font-size:8.0pt;font-family:"Times New Roman",serif;
  mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
  major-bidi;color:black;mso-color-alt:windowtext'>Introduction to
                            Microeconomics</span><span lang=EN-US
                            style='font-size:8.0pt;font-family:
  "Times New Roman",serif;mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:
  major-bidi;mso-bidi-theme-font:major-bidi'>
                            <o:p></o:p>
                        </span></p>
                </td>
                <td width=48
                    valign=top
                    style='width:35.8pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                    <p class=MsoNormal
                        style='margin-bottom:0in;text-align:justify;line-height:
  normal;background:white;mso-background-themecolor:background1'><span lang=EN-US
                            style='font-size:8.0pt;font-family:"Times New Roman",serif;
  mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
  major-bidi'>
                            <o:p>&nbsp;</o:p>
                        </span></p>
                </td>
                <td width=60
                    valign=top
                    style='width:44.7pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                    <p class=MsoNormal
                        style='margin-bottom:0in;text-align:justify;line-height:
  normal;background:white;mso-background-themecolor:background1'><span lang=EN-US
                            style='font-size:8.0pt;font-family:"Times New Roman",serif;
  mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
  major-bidi;color:black;mso-color-alt:windowtext'>BSSM301</span><span lang=EN-US
                            style='font-size:8.0pt;font-family:"Times New Roman",serif;
  mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
  major-bidi'>
                            <o:p></o:p>
                        </span></p>
                </td>
                <td width=37
                    valign=top
                    style='width:28.1pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                    <p class=MsoNormal
                        align=center
                        style='margin-bottom:0in;text-align:center;
  line-height:normal;background:white;mso-background-themecolor:background1'><span lang=EN-US
                            style='font-size:8.0pt;font-family:"Times New Roman",serif;
  mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
  major-bidi;color:black;mso-color-alt:windowtext'>3</span><span lang=EN-US
                            style='font-size:8.0pt;font-family:"Times New Roman",serif;mso-ascii-theme-font:
  major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'>
                            <o:p></o:p>
                        </span></p>
                </td>
                <td width=177
                    valign=top
                    style='width:133.1pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                    <p class=MsoNormal
                        style='margin-bottom:0in;text-align:justify;line-height:
  normal;background:white;mso-background-themecolor:background1'><span lang=EN-US
                            style='font-size:8.0pt;font-family:"Times New Roman",serif;
  mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
  major-bidi;color:black;mso-color-alt:windowtext'>Mathematics I</span><span lang=EN-US
                            style='font-size:8.0pt;font-family:"Times New Roman",serif;
  mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
  major-bidi'>
                            <o:p></o:p>
                        </span></p>
                </td>
                <td width=44
                    valign=top
                    style='width:32.8pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                    <p class=MsoNormal
                        style='margin-bottom:0in;text-align:justify;line-height:
  normal;background:white;mso-background-themecolor:background1'><span lang=EN-US
                            style='font-size:9.0pt;font-family:"Times New Roman",serif;
  mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
  major-bidi'>
                            <o:p>&nbsp;</o:p>
                        </span></p>
                </td>
            </tr>
            <tr style='mso-yfti-irow:3'>
                <td width=62
                    valign=top
                    style='width:46.4pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0in 5.4pt 0in 5.4pt'>
                    <p class=MsoNormal
                        style='margin-bottom:0in;text-align:justify;line-height:
  normal'><span lang=EN-US
                            style='font-size:8.0pt;font-family:"Times New Roman",serif;
  mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
  major-bidi'>BSHA100<o:p></o:p></span></p>
                </td>
                <td width=38
                    valign=top
                    style='width:28.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                    <p class=MsoNormal
                        align=center
                        style='margin-bottom:0in;text-align:center;
  line-height:normal'><span lang=EN-US
                            style='font-size:8.0pt;font-family:"Times New Roman",serif;
  mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
  major-bidi'>3<o:p></o:p></span></p>
                </td>
                <td width=159
                    valign=top
                    style='width:118.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                    <p class=MsoNormal
                        style='margin-bottom:0in;text-align:justify;line-height:
  normal;background:white;mso-background-themecolor:background1'><span lang=EN-US
                            style='font-size:8.0pt;font-family:"Times New Roman",serif;
  mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
  major-bidi;color:black;mso-color-alt:windowtext'>Arabic Language I</span><span lang=EN-US
                            style='font-size:8.0pt;font-family:"Times New Roman",serif;
  mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
  major-bidi'>
                            <o:p></o:p>
                        </span></p>
                </td>
                <td width=48
                    valign=top
                    style='width:35.8pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                    <p class=MsoNormal
                        style='margin-bottom:0in;text-align:justify;line-height:
  normal;background:white;mso-background-themecolor:background1'><span lang=EN-US
                            style='font-size:8.0pt;font-family:"Times New Roman",serif;
  mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
  major-bidi'>
                            <o:p>&nbsp;</o:p>
                        </span></p>
                </td>
                <td width=60
                    valign=top
                    style='width:44.7pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                    <p class=MsoNormal
                        style='margin-bottom:0in;text-align:justify;line-height:
  normal;background:white;mso-background-themecolor:background1'><span lang=EN-US
                            style='font-size:8.0pt;font-family:"Times New Roman",serif;
  mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
  major-bidi;color:black;mso-color-alt:windowtext'>BSSS100</span><span lang=EN-US
                            style='font-size:8.0pt;font-family:"Times New Roman",serif;
  mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
  major-bidi'>
                            <o:p></o:p>
                        </span></p>
                </td>
                <td width=37
                    valign=top
                    style='width:28.1pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                    <p class=MsoNormal
                        align=center
                        style='margin-bottom:0in;text-align:center;
  line-height:normal;background:white;mso-background-themecolor:background1'><span lang=EN-US
                            style='font-size:8.0pt;font-family:"Times New Roman",serif;
  mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
  major-bidi;color:black;mso-color-alt:windowtext'>3</span><span lang=EN-US
                            style='font-size:8.0pt;font-family:"Times New Roman",serif;mso-ascii-theme-font:
  major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'>
                            <o:p></o:p>
                        </span></p>
                </td>
                <td width=177
                    valign=top
                    style='width:133.1pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                    <p class=MsoNormal
                        style='margin-bottom:0in;text-align:justify;line-height:
  normal;background:white;mso-background-themecolor:background1'><span lang=EN-US
                            style='font-size:8.0pt;font-family:"Times New Roman",serif;
  mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
  major-bidi;color:black;mso-color-alt:windowtext'>Descriptive Statistics</span><span lang=EN-US
                            style='font-size:8.0pt;font-family:"Times New Roman",serif;
  mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
  major-bidi'>
                            <o:p></o:p>
                        </span></p>
                </td>
                <td width=44
                    valign=top
                    style='width:32.8pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                    <p class=MsoNormal
                        style='margin-bottom:0in;text-align:justify;line-height:
  normal;background:white;mso-background-themecolor:background1'><span lang=EN-US
                            style='font-size:9.0pt;font-family:"Times New Roman",serif;
  mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
  major-bidi'>
                            <o:p>&nbsp;</o:p>
                        </span></p>
                </td>
            </tr>
            <tr style='mso-yfti-irow:4'>
                <td width=62
                    valign=top
                    style='width:46.4pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0in 5.4pt 0in 5.4pt'>
                    <p class=MsoNormal
                        style='margin-bottom:0in;text-align:justify;line-height:
  normal'><span lang=EN-US
                            style='font-size:8.0pt;font-family:"Times New Roman",serif;
  mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
  major-bidi'>BSHE100<o:p></o:p></span></p>
                </td>
                <td width=38
                    valign=top
                    style='width:28.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                    <p class=MsoNormal
                        align=center
                        style='margin-bottom:0in;text-align:center;
  line-height:normal'><span lang=EN-US
                            style='font-size:8.0pt;font-family:"Times New Roman",serif;
  mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
  major-bidi'>3<o:p></o:p></span></p>
                </td>
                <td width=159
                    valign=top
                    style='width:118.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                    <p class=MsoNormal
                        style='margin-bottom:0in;text-align:justify;line-height:
  normal;background:white;mso-background-themecolor:background1'><span lang=EN-US
                            style='font-size:8.0pt;font-family:"Times New Roman",serif;
  mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
  major-bidi;color:black;mso-color-alt:windowtext'>English Language I</span><span lang=EN-US
                            style='font-size:8.0pt;font-family:"Times New Roman",serif;
  mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
  major-bidi'>
                            <o:p></o:p>
                        </span></p>
                </td>
                <td width=48
                    valign=top
                    style='width:35.8pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                    <p class=MsoNormal
                        style='margin-bottom:0in;text-align:justify;line-height:
  normal;background:white;mso-background-themecolor:background1'><span lang=EN-US
                            style='font-size:8.0pt;font-family:"Times New Roman",serif;
  mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
  major-bidi'>
                            <o:p>&nbsp;</o:p>
                        </span></p>
                </td>
                <td width=60
                    valign=top
                    style='width:44.7pt;border:none;mso-border-top-alt:
  solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                    <p class=MsoNormal
                        style='margin-bottom:0in;text-align:justify;line-height:
  normal;background:white;mso-background-themecolor:background1'><span lang=EN-US
                            style='font-size:8.0pt;font-family:"Times New Roman",serif;
  mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
  major-bidi'>
                            <o:p>&nbsp;</o:p>
                        </span></p>
                </td>
                <td width=37
                    valign=top
                    style='width:28.1pt;border:none;mso-border-top-alt:
  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                    <p class=MsoNormal
                        align=center
                        style='margin-bottom:0in;text-align:center;
  line-height:normal;background:white;mso-background-themecolor:background1'><span lang=EN-US
                            style='font-size:8.0pt;font-family:"Times New Roman",serif;
  mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
  major-bidi'>
                            <o:p>&nbsp;</o:p>
                        </span></p>
                </td>
                <td width=177
                    valign=top
                    style='width:133.1pt;border:none;mso-border-top-alt:
  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                    <p class=MsoNormal
                        style='margin-bottom:0in;text-align:justify;line-height:
  normal;background:white;mso-background-themecolor:background1'><span lang=EN-US
                            style='font-size:8.0pt;font-family:"Times New Roman",serif;
  mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
  major-bidi'>
                            <o:p>&nbsp;</o:p>
                        </span></p>
                </td>
                <td width=44
                    valign=top
                    style='width:32.8pt;border:none;mso-border-top-alt:
  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                    <p class=MsoNormal
                        style='margin-bottom:0in;text-align:justify;line-height:
  normal;background:white;mso-background-themecolor:background1'><span lang=EN-US
                            style='font-size:9.0pt;font-family:"Times New Roman",serif;
  mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
  major-bidi'>
                            <o:p>&nbsp;</o:p>
                        </span></p>
                </td>
            </tr>
            <tr style='mso-yfti-irow:5;mso-yfti-lastrow:yes'>
                <td width=62
                    valign=top
                    style='width:46.4pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0in 5.4pt 0in 5.4pt'>
                    <p class=MsoNormal
                        style='margin-bottom:0in;text-align:justify;line-height:
  normal'><span lang=EN-US
                            style='font-size:8.0pt;font-family:"Times New Roman",serif;
  mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
  major-bidi'>BSHS100<o:p></o:p></span></p>
                </td>
                <td width=38
                    valign=top
                    style='width:28.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                    <p class=MsoNormal
                        align=center
                        style='margin-bottom:0in;text-align:center;
  line-height:normal'><span lang=EN-US
                            style='font-size:8.0pt;font-family:"Times New Roman",serif;
  mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
  major-bidi'>2<o:p></o:p></span></p>
                </td>
                <td width=159
                    valign=top
                    style='width:118.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                    <p class=MsoNormal
                        style='margin-bottom:0in;text-align:justify;line-height:
  normal;background:white;mso-background-themecolor:background1'><span lang=EN-US
                            style='font-size:8.0pt;font-family:"Times New Roman",serif;
  mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
  major-bidi;color:black;mso-color-alt:windowtext'>Sudanese Studies</span><span lang=EN-US
                            style='font-size:8.0pt;font-family:"Times New Roman",serif;
  mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
  major-bidi'>
                            <o:p></o:p>
                        </span></p>
                </td>
                <td width=48
                    valign=top
                    style='width:35.8pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                    <p class=MsoNormal
                        style='margin-bottom:0in;text-align:justify;line-height:
  normal;background:white;mso-background-themecolor:background1'><span lang=EN-US
                            style='font-size:8.0pt;font-family:"Times New Roman",serif;
  mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
  major-bidi'>
                            <o:p>&nbsp;</o:p>
                        </span></p>
                </td>
                <td width=60
                    valign=top
                    style='width:44.7pt;border:none;mso-border-left-alt:
  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                    <p class=MsoNormal
                        style='margin-bottom:0in;text-align:justify;line-height:
  normal;background:white;mso-background-themecolor:background1'><span lang=EN-US
                            style='font-size:8.0pt;font-family:"Times New Roman",serif;
  mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
  major-bidi'>
                            <o:p>&nbsp;</o:p>
                        </span></p>
                </td>
                <td width=37
                    valign=top
                    style='width:28.1pt;border:none;padding:0in 5.4pt 0in 5.4pt'>
                    <p class=MsoNormal
                        style='margin-bottom:0in;text-align:justify;line-height:
  normal;background:white;mso-background-themecolor:background1'><span lang=EN-US
                            style='font-size:8.0pt;font-family:"Times New Roman",serif;
  mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
  major-bidi'>
                            <o:p>&nbsp;</o:p>
                        </span></p>
                </td>
                <td width=177
                    valign=top
                    style='width:133.1pt;border:none;padding:0in 5.4pt 0in 5.4pt'>
                    <p class=MsoNormal
                        style='margin-bottom:0in;text-align:justify;line-height:
  normal;background:white;mso-background-themecolor:background1'><span lang=EN-US
                            style='font-size:8.0pt;font-family:"Times New Roman",serif;
  mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
  major-bidi'>
                            <o:p>&nbsp;</o:p>
                        </span></p>
                </td>
                <td width=44
                    valign=top
                    style='width:32.8pt;border:none;padding:0in 5.4pt 0in 5.4pt'>
                    <p class=MsoNormal
                        style='margin-bottom:0in;text-align:justify;line-height:
  normal;background:white;mso-background-themecolor:background1'><span lang=EN-US
                            style='font-size:9.0pt;font-family:"Times New Roman",serif;
  mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
  major-bidi'>
                            <o:p>&nbsp;</o:p>
                        </span></p>
                </td>
            </tr>
        </table>
        <br>
        <br>
        table End -->


        <!-- footer start -->
        <p class=MsoNormal
            style='margin-bottom:0in'><span class=SpellE><b><span lang=EN-US
                        style='font-size:10.0pt;line-height:107%;font-family:"Times New Roman",serif;
mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
major-bidi'>Ust</span></b></span><b><span lang=EN-US
                    style='font-size:10.0pt;
line-height:107%;font-family:"Times New Roman",serif;mso-ascii-theme-font:major-bidi;
mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'>. Kawther Abu
                    Elnaja<span style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </span>Dr. <span class=SpellE>Isameldeen</span> Mohmed Khair Mohmed<o:p></o:p></span></b></p>

        <p class=MsoNormal
            style='margin-bottom:0in'><b><span lang=EN-US
                    style='font-size:10.0pt;line-height:107%;font-family:"Times New Roman",serif;
mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
major-bidi'>The University Registrar<span style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </span>Deputy President for Academic Affairs<span style='mso-spacerun:yes'>&nbsp;
                    </span>
                    <o:p></o:p>
                </span></b></p>

        <p class=MsoNormal
            style='margin-bottom:0in'><b><span lang=EN-US
                    style='font-size:10.0pt;line-height:107%;font-family:"Times New Roman",serif;
mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
major-bidi'>
                    <o:p>&nbsp;</o:p>
                </span></b></p>

        <p class=MsoNormal
            style='margin-bottom:0in'><b><span lang=EN-US
                    style='font-size:8.0pt;line-height:107%;font-family:"Times New Roman",serif;
mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
major-bidi'>
                    <o:p><span style='text-decoration:none'>&nbsp;</span></o:p>
                </span></b></p>

        <p class=MsoNormal
            style='margin-bottom:0in'><b><span lang=EN-US
                    style='font-size:8.0pt;line-height:107%;font-family:"Times New Roman",serif;
mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
major-bidi'>
                    <o:p><span style='text-decoration:none'>&nbsp;</span></o:p>
                </span></b></p>

        <p class=MsoNormal
            style='margin-bottom:0in'><b><span lang=EN-US
                    style='font-size:8.0pt;line-height:107%;font-family:"Times New Roman",serif;
mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
major-bidi'>
                    <o:p><span style='text-decoration:none'>&nbsp;</span></o:p>
                </span></b></p>

        <p class=MsoNormal
            style='margin-bottom:0in'><b><span lang=EN-US
                    style='font-size:8.0pt;line-height:107%;font-family:"Times New Roman",serif;
mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
major-bidi'>
                    <o:p><span style='text-decoration:none'>&nbsp;</span></o:p>
                </span></b></p>

        <p class=MsoNormal
            style='margin-bottom:0in'><b><span lang=EN-US
                    style='font-size:8.0pt;line-height:107%;font-family:"Times New Roman",serif;
mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
major-bidi'>
                    <o:p><span style='text-decoration:none'>&nbsp;</span></o:p>
                </span></b></p>

        <p class=MsoNormal
            style='margin-bottom:0in'><b><u><span lang=EN-US
                        style='font-size:8.0pt;line-height:107%;font-family:"Times New Roman",serif;
mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
major-bidi'>The <span class=GramE>4 point</span> system is used CGPA of 2 is
                        required to award degree <o:p></o:p></span></u></b></p>

        <p class=MsoNormal
            style='margin-bottom:0in'><span class=GramE><b><span lang=EN-US
                        style='font-size:7.0pt;line-height:107%;font-family:"Times New Roman",serif;
mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
major-bidi'>A,A</span></b></span><b><span lang=EN-US
                    style='font-size:7.0pt;
line-height:107%;font-family:"Times New Roman",serif;mso-ascii-theme-font:major-bidi;
mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'>-<span style='mso-spacerun:yes'>&nbsp; </span>Excellent<span style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>B+,B , B- Good<span style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>C+,C Pass<span style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; </span>C-,D+,D Conditionally Passing<o:p></o:p></span></b></p>

        <p class=MsoNormal
            style='margin-bottom:0in'><b><span lang=EN-US
                    style='font-size:7.0pt;line-height:107%;font-family:"Times New Roman",serif;
mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
major-bidi'>F<span style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>Fall<span style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>Z<span style='mso-spacerun:yes'>&nbsp;&nbsp; </span>Unauthorized Absence, Falling<span style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>P Passing a
                    P/F Course<o:p></o:p></span></b></p>

        <p class=MsoNormal
            style='margin-bottom:0in'><b><span lang=EN-US
                    style='font-size:7.0pt;line-height:107%;font-family:"Times New Roman",serif;
mso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:
major-bidi'>I<span style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>complete<span style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span><span class=GramE>W<span style='mso-spacerun:yes'>&nbsp; </span>Withdraw</span>
                    <o:p></o:p>
                </span></b></p>

        <p class=MsoNormal
            style='margin-bottom:0in'><span lang=EN-US
                style='font-size:
8.0pt;line-height:107%;font-family:"Times New Roman",serif;mso-ascii-theme-font:
major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'>
                <o:p>&nbsp;</o:p>
            </span></p>

        <p class=MsoNormal
            style='margin-bottom:0in'><span lang=EN-US
                style='font-size:
8.0pt;line-height:107%;font-family:"Times New Roman",serif;mso-ascii-theme-font:
major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'>Date
                of Issue ,<?php echo  N_Date($std_cert_data['cert_printed_at']); ?>.<span style='mso-spacerun:yes'> </span>
                <o:p></o:p>
            </span></p>

        <p class=MsoNormal
            style='margin-bottom:0in'><span lang=EN-US
                style='font-size:
8.0pt;line-height:107%;font-family:"Times New Roman",serif;mso-ascii-theme-font:
major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi'>
                <o:p>&nbsp;</o:p>
            </span></p>

        <p class=MsoNormal><span lang=EN-US>
                <o:p>&nbsp;</o:p>
            </span></p>

        <span lang=EN-US
            style='font-size:11.0pt;line-height:107%;font-family:"Calibri",sans-serif;
mso-ascii-theme-font:minor-latin;mso-fareast-font-family:Calibri;mso-fareast-theme-font:
minor-latin;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:Arial;
mso-bidi-theme-font:minor-bidi;mso-ansi-language:EN-US;mso-fareast-language:
EN-US;mso-bidi-language:AR-SA'><br clear=all
                style='mso-special-character:line-break;
page-break-before:always'>
        </span>

        <p class=MsoNormal><span lang=EN-US>
                <o:p>&nbsp;</o:p>
            </span></p>

        <p class=MsoNormal><span lang=EN-US>
                <o:p>&nbsp;</o:p>
            </span></p>

    </div>

</body>

</html>