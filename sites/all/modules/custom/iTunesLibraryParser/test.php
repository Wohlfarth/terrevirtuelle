<? header('Content-Type: text/html; charset=utf-8'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link title="new" rel="stylesheet" href="css/main.css" type="text/css">
<link REL="shortcut icon" HREF="favicon.ico" TYPE="image/x-icon">
<title>Converting Your iTunes Library To Html</title>
</head>
<body style="margin-left:0px;margin-top:0px;" bgcolor="#ffffff"><table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr><td valign="top" align="right" colspan="1" bgcolor="#ffffff"><table border="0" cellspacing="0" cellpadding="0" width="100%"><tr>
<td width="99%" class="content" valign="top" align="left">
<br><p class="dochead">Converting Your iTunes Library To Html</p>
<form name="contents" action="http://www.coin-c.com/">
<b>Contents</b>:
    <select name="url" size="1" OnChange="location.href=form.url.options[form.url.selectedIndex].value" style="font-family:Arial,Helvetica, sans-serif; font-size:10"><option value="#doc_chap1">1. Introduction</option>
<option value="#doc_chap2">2. About the XML file</option>
<option value="#doc_chap3">3. Prerequisites</option>
<option value="#doc_chap4">4. Compiling the Package</option>
<option value="#doc_chap5">5. Converting the XML file</option>
<option value="#doc_chap6">6. Getting the images out of the mp3 files</option>
<option value="#doc_chap7">7. Naming Files</option>
<option value="#doc_chap8">8. Making HTML</option>
<option value="#doc_chap9">9. One Simple Package</option>
<option value="#doc_chap10">10. Tips and Tricks</option>
<option value="#doc_chap11">11. Conclusion</option>
<option value="#doc_chap12">12. Future Wishlist and Todo</option>
<option value="#doc_chap13">13. Resources</option></select>
</form>
<p class="chaphead">1. Introduction</p>

    <table class="ncontent" width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td bgcolor="#ffbbbb"><p class="note"><b>Warning: </b>
    CCTunes is nearly constantly changing.  Not all of this documentation may correspond to the
    way CCTunes is working when you downloaded it.
    </p></td></tr></table>

    <p>
    iTunes is keeping track of all the information of your music library, in a proprietary
    database file and does not provide any
    interface to manipulate that.  You have to go through AppleScript to get or set information
    in it.  This is sometimes nice, some people have nice websites of all sorts of AppleScripts
    to do whatever they felt useful to do, but I have not found much information on how to
    publish your whole library in html-format.  Therefore I went to search the internet, and
    found some links which set me on my way to get my own solution.
    </p>

    <p>
    It might not be perfect, it might not even be nice, but it could do for you.  Anyway, <a href="http://www.coin-c.com/kristof/mycds/peephole.html">it did for me</a>.  As of
    lately, I've bundled <span class="emphasis">everything together in a nice little application</span> which you can
    <a href="http://www.coin-c.com/CCTunes/index.html">find here</a>.
    </p>

    <p>
    You can see a list of similar packages at the end of this document.  Some of them are
    payware, some of them are freeware.  All of them have advantages and disadvantages, and
    you might well find that mine is not the package that best suits your needs.  However, you
    will find that mine comes with a full explanation of what it does.  As a matter of fact, it
    actually grew out of this documentation and has not had a purpose so far but illustrating
    this text.  That might change in the future, but as for now, it's better to still consider
    it like that.  If you have some success or ideas with the package, I'd be glad to hear!
    </p>
    
    <p class="chaphead">2. About the XML file</p>
    
    <p>
    The XML file resides in your home directory, at <span class="path">~/Music/iTunes/iTunes Music Library.xml</span>.
    It has been described as braindead and, agreed, it does not look like one would expect an xml file
    for a music library would look like.  It is track based, and every track has an ID and most of the
    information one would expect to find there, except for some, like the images.  There does not seem to be
    a logical way in which the Track IDs are assigned and they tend to change when f.i. you reencode
    songs.  Where one would expect the name of the tag
    has information about the information contained in the tag, the XML file just has key tags followed
    by value tags, like a dictionary streamed out.  This is the typical <span class="code">plist</span> approach of Apple, and
    it's just another example of how not to use XML, imho.
    </p>
    <p>
    When you are playing tracks in your iTunes application, iTunes seems to update both a private
    proprietary database file and the xml file.  The proprietary database, <span class="path">~/Music/iTunes/iTunes 4
    Music Library</span>, is the master file.  Whatever you change in the xml file, if the database
    file is not updated, the next time you play something in iTunes, the XML file will be updated
    again.  Very annoying.
    </p>
    <p class="chaphead">3. Prerequisites</p>
    <p class="secthead"><a name="doc_chap3_sect1">Organizing The Library</a></p>
      <p>
        First of all, it was my aim to make a nice list of all the albums I posess in my iTunes library.
        I am in the ongoing process of converting my whole CD collection, some couple of hundred CDs, to
        MP3, and while doing so, I try to keep a list.  I used to do this by updating some spreadsheet
        file in GNumeric, which is still a viable approach, but this is nicer.  However, I use certain
        rules to tag my MP3s:
        <ul>
          <li>I don't keep track of Genres.  They are never accurate anyway.</li>
          <li>I try to keep the Artwork of the tracks to just contain the Album cover art, not
	      any other artwork, like singles cover art or logos.</li>
	  <li>I try to keep the disk numbers up to date.  They are often ignored but I want albums
	      consisting of multiple CDs to be treated as one album.</li>
	  <li>Make sure compilations are treated as such by iTunes by setting the Compilation
	      ID3 Tag.</li>
	  <li>Compilation albums have the compilation checkbox set correctly, and have the same
	      composer.  The artists can be different per track, but the composer is meant to
	      be the one that has composed the compilation.  This is open for discussion, I know,
	      but this is the rule I will adjust when making the final layout.</li>
	  <li>Greatest Hits are therefore no compilations!  Many of the entries at cddb are
	      set differently, so it might be necessary to correct this.</li>
        </ul>
	You do not <span class="emphasis">have</span> to organize your library like I do, but just in order for all of
	this to work and look nicely, I recommend this approach.  I recommend this approach
	anyway, I think it should be forced by law to organize your library like this ;-).
      </p>
      
    <p class="secthead"><a name="doc_chap3_sect2">Installing the software used</a></p>
      <p>
        In earlier versions I used perl modules like MP3::Info to
	extract the images and ImageMagick command line tools to
	generate the thumbnails.  However, things are much simpler
	now: I've made a self contained package which is downloadable
	and has everything you will need.
      </p>
      
    <p class="chaphead">4. Compiling the Package</p>
      In order to compile the package yourself, you will need a couple of directions, because
      I have just assembled together a bunch of things using command line scripting and XCode.
      This chapter will give some directions, but it is not complete yet.  The most important
      things should be covered, and if you're having troubles, just ask.  Updates will follow
      and be consecutively outdated by updates to the software, but anyway, let's hope it's
      valuable to some.      
      <p class="secthead"><a name="doc_chap4_sect1">Compiling XML Starlet</a></p>
        <p>
          One of the things you will need is XML Starlet.  In earlier days CCTunes was based
          on <span class="code">xsltproc</span>, which is ok but not as flexible as XML starlet I thought.  So,
          I compiled the thing and it does all I need it to do, like xsltrpoc would but easier
          than xsltproc would.
        </p>
        <p>
          You will need to download the source packages from libxml2 (libxml2-2.6.14.tar.gz),
          and a compatible libxslt (libxslt-1.1.9.tar.gz) and XML Starlet (xmlstarlet-0.9.5.tar.gz).
          Those are the versions I used.  Other versions might work for you in similar ways, but
          chances are you run into compatibility issues which you will have to resolve yourself.
          Give me a reason to upgrade to another version of XML Starlet and I will.
        </p>
        <p>
          Compiling is the usual bunch of <span class="code">configure</span> and <span class="code">make</span> and <span class="code">make install</span>'s,
          but because we don't want to use any system libraries we are going to give some instructions
          to place the installed binaries in a temporary directory.  Here we go for libxml2:
        </p>
<a name="doc_chap4_pre1"></a><table class="ntable" width="100%" cellspacing="0" cellpadding="0" border="0">
<tr><td class="infohead" bgcolor="#7a5ada"><p class="caption">
            Code listing 4.1</p></td></tr>
<tr><td bgcolor="#ddddff"><pre>
mkdir ~/docxmlstarlet
cd ~/docxmlstarlet/
mkdir tmp
mkdir tmp/prefix
mkdir tmp/eprefix
cp ~/Downloads/libxml2-2.6.14.tar.gz .
tar xvfz libxml2-2.6.14.tar.gz 
cd libxml2-2.6.14
./configure --prefix=$HOME/docxmlstarlet/tmp/prefix/ --exec-prefix=$HOME/docxmlstarlet/tmp/eprefix/
make; make install
</pre></td></tr>
</table>
        <p>
          This will take a while (and use up my laptop's battery while I'm writing this on the train ;-) ),
          but in the end we will have the libraries installed and setup to go to the next phase: compiling
          the xslt libraries.  Very similarly the following instructions trigger the same process:
        </p>
<a name="doc_chap4_pre2"></a><table class="ntable" width="100%" cellspacing="0" cellpadding="0" border="0">
<tr><td class="infohead" bgcolor="#7a5ada"><p class="caption">
            Code listing 4.2</p></td></tr>
<tr><td bgcolor="#ddddff"><pre>
cd ~/docxmlstarlet/
cp ~/Downloads/libxslt-1.1.9.tar.gz .
tar xvfz libxslt-1.1.9.tar.gz
cd libxslt-1.1.9
./configure --prefix=$HOME/docxmlstarlet/tmp/prefix --exec-prefix=$HOME/docxmlstarlet/tmp/eprefix \
    --with-libxml-prefix=$HOME/docxmlstarlet/tmp/eprefix \
    --with-libxml-include-prefix=$HOME/docxmlstarlet/tmp/prefix/include \
    --with-libxml-libs-prefix=$HOME/docxmlstarlet/tmp/eprefix/lib
make; make install
</pre></td></tr>
</table>
        <p>
          And finally, for XML Starlet.  The version we are using has a few glitches that we need to
          tweak.  Let's first do similarly:
        </p>
<a name="doc_chap4_pre3"></a><table class="ntable" width="100%" cellspacing="0" cellpadding="0" border="0">
<tr><td class="infohead" bgcolor="#7a5ada"><p class="caption">
            Code listing 4.3</p></td></tr>
<tr><td bgcolor="#ddddff"><pre>
cd ~/docxmlstarlet/
cp ~/Downloads/xmlstarlet-0.8.1.tar.gz .
tar xvfz xmlstarlet-0.8.1.tar.gz
cd xmlstarlet-0.8.1
open .
</pre></td></tr>
</table>
        <p>
          Now, ideally we would have the same set of instructions to make the executables but it
          turns out there were some mistakes in the configure script, which is found in the directory
          that pops up.  Locate the <span class="path">configure</span> script and open it with your favourite
          text editor.  First of all, since we
          are using libxml2 version 2.6.14, the configure script thinks we are using version
          2.6.1, which is not what it expects.  To fix this, change <span class="code">if test "$LIBXML_VERSION" -lt 262; then</span>
          on line 900 to <span class="code">if test "$LIBXML_VERSION" -lt 260; then</span>.  That will fix that bug.
          Also, it doesn't consider our system as a macintosh like system.  Therefore, change
          <span class="code">*mac*</span> on line 1811 to <span class="code">*apple-darwin*</span>.  That's it, the usual command sequence
          should complete the compilation:
        </p>
<a name="doc_chap4_pre4"></a><table class="ntable" width="100%" cellspacing="0" cellpadding="0" border="0">
<tr><td class="infohead" bgcolor="#7a5ada"><p class="caption">
            Code listing 4.4</p></td></tr>
<tr><td bgcolor="#ddddff"><pre>
./configure --prefix=$HOME/docxmlstarlet/tmp/prefix \
            --exec-prefix=$HOME/docxmlstarlet/tmp/eprefix \
            --with-libxml-prefix=$HOME/docxmlstarlet/tmp/eprefix \
            --with-libxml-include-prefix=$HOME/docxmlstarlet/tmp/prefix/include \
            --with-libxml-libs-prefix=$HOME/docxmlstarlet/tmp/eprefix/lib \
            --with-libxslt-prefix=$HOME/docxmlstarlet/tmp/eprefix \
            --with-libxslt-include-prefix=$HOME/docxmlstarlet/tmp/prefix/include \
            --with-libslt-libs-prefix=$HOME/docxmlstarlet/tmp/eprefix/lib \
            --with-libiconv-prefix=/usr \
            --with-libiconv-libs-prefix=/usr
make; make install
</pre></td></tr>
</table>
        <p>
          And, at <span class="path">$HOME/docxmlstarlet/tmp/eprefix/bin/</span> there is the <span class="code">xml</span> executable
          that is the XML Starlet we wanted.  That's the one you find, checked in in the <span class="path">package</span>
          directory of <a href="http://www.coin-c.com/CCTunes/cct-download.html">the source package you
          can download</a>.
        </p>
        
      <p class="secthead"><a name="doc_chap4_sect2">Compiling id3 libraries</a></p> ... to be completed ... 
      <p class="secthead"><a name="doc_chap4_sect3">Compiling the total package</a></p> ... to be completed (use XCode on Panther) ... 
    <p class="chaphead">5. Converting the XML file</p>
    <p class="secthead"><a name="doc_chap5_sect1">Forcing the XML file to make sense</a></p>
       We want a decent xml file to start with, not that plisty file that is not like anything
	we would come up with ourselves.  Luckily there are people that helped me on the way to
	do this.  Searching google
	gave me a nice little link, <a href="http://www.xmldatabases.org/WK/blog/1086?t=item">http://www.xmldatabases.org/WK/blog/1086?t=item</a>
	which explained it all.  Now that was very useful.  Step one finished.

<a name="doc_chap5_pre1"></a><table class="ntable" width="100%" cellspacing="0" cellpadding="0" border="0">
<tr><td class="infohead" bgcolor="#7a5ada"><p class="caption">
            Code listing 5.1: makeProperXml.xsl file makes a nicer XML file</p></td></tr>
<tr><td bgcolor="#ddddff"><pre>
&lt;xsl:stylesheet
    xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
    xsl:version="1.0"&gt;
        
  &lt;xsl:template match="/"&gt;
    &lt;songlist&gt;
      &lt;xsl:text&gt;
      &lt;/xsl:text&gt;
      &lt;xsl:apply-templates select="plist/dict/dict/dict"/&gt;
    &lt;/songlist&gt;
    &lt;xsl:text&gt;
    &lt;/xsl:text&gt;
  &lt;/xsl:template&gt;
  &lt;xsl:template match="dict"&gt;
    &lt;song&gt;
      &lt;xsl:text&gt;
      &lt;/xsl:text&gt;
        &lt;SortKey&gt;
          &lt;xsl:variable name="SortArtist"      select="string[preceding-sibling::node()[1]='Artist']" /&gt;
          &lt;xsl:variable name="SortAlbum"       select="string[preceding-sibling::node()[1]='Album']" /&gt;
          &lt;xsl:variable name="Composer"       select="string[preceding-sibling::node()[1]='Composer']" /&gt;
          &lt;xsl:variable name="StartsWithThe" select="starts-with($SortArtist,'The ')" /&gt;
          &lt;xsl:choose&gt;
            &lt;xsl:when test="true[preceding-sibling::node()[1]='Compilation']"&gt;
              &lt;xsl:value-of select="'ZZZZZZZZZZZ-VA'" /&gt;&lt;xsl:text&gt; - &lt;/xsl:text&gt;
              &lt;xsl:value-of select="$Composer" /&gt;&lt;xsl:text&gt; - &lt;/xsl:text&gt;
              &lt;xsl:value-of select="$SortAlbum" /&gt;
            &lt;/xsl:when&gt;
            &lt;xsl:otherwise&gt;
              &lt;xsl:choose&gt;
                &lt;xsl:when test="$StartsWithThe"&gt;
                  &lt;xsl:value-of select="substring-after($SortArtist,'The ')" /&gt;&lt;xsl:text&gt; - &lt;/xsl:text&gt;
                  &lt;xsl:value-of select="$SortAlbum" /&gt;
                &lt;/xsl:when&gt;
                &lt;xsl:otherwise&gt;
                  &lt;xsl:value-of select="$SortArtist" /&gt;&lt;xsl:text&gt; - &lt;/xsl:text&gt;
                  &lt;xsl:value-of select="$SortAlbum" /&gt;
                &lt;/xsl:otherwise&gt;
              &lt;/xsl:choose&gt;
            &lt;/xsl:otherwise&gt;
          &lt;/xsl:choose&gt;
	&lt;/SortKey&gt;
          &lt;xsl:text&gt;
          &lt;/xsl:text&gt;
      &lt;xsl:apply-templates select="key"/&gt;
      &lt;xsl:text&gt;
      &lt;/xsl:text&gt;
    &lt;/song&gt;
  &lt;/xsl:template&gt;
  &lt;xsl:template match="key"&gt;
    &lt;!-- main template that makes plist style conversion to XML style conversion --&gt;
    &lt;xsl:element name="{translate(text(), ' ', '_')}"&gt;
      &lt;xsl:value-of select="following-sibling::node()[1]"/&gt;
    &lt;/xsl:element&gt;
    &lt;xsl:text&gt;
    &lt;/xsl:text&gt;
  &lt;/xsl:template&gt;
&lt;/xsl:stylesheet&gt;


</pre></td></tr>
</table>
    <p>
      This style sheet applied to the plist-file you get by exporting an iTunes library to XML
      gives you a list of tracks that is structured in a way that makes it easier to take the
      XSL formatting a step further.
    </p>
    <p>
      For those with little XSL experience I will explain what is going on.  To simplify the
      reading, you can ignore the xsl:text nodes, which just serve to insert newlines in the
      resulting XML file.
    </p>
    <p>
      The most important part of the stylesheet is where the key is converted from the plist
      style to regular XML style.  That is, <span class="code">&lt;key&gt;Key Name&lt;/key&gt; &lt;string&gt;StringValue&lt;/string&gt;</span>
      is converted to an element with name Key_Name and a child text node StringValue,
      like this: <span class="code">&lt;Key_Name&gt;StringValue&lt;/Key_Name&gt;</span>.  This is more like
      what you expect in an XML file.  This is the part done in the xsl:template on the
      last 9 lines of the file.
    </p>
    <p>
      The songlist is generated on a per track basis, so as a result we will have one big
      long songlist.  We need to differentiate between various albums from this list, and
      that is what the <span class="code">SortKey</span> element is for.  For every song in the songlist we
      will generate a key based on the artist, the albumname and the fact that it is part
      of a compilation or not.  Songs that are part of a compilation will rather use the
      composer tag to differentiate the albums than the artist tag, per definition.  Also,
      we want the compilations to be at the end of the list, so we start their SortKey with
      ZZZZZZZZZ so that even ZZ-top will be before any compilation in the library.  As a
      last special thing, we want to ignore the first "The" in group names, so that The Smiths
      is just after Sigur RÃ³s and not after The Notwist.  Like iTunes does.  That is also
      arranged via this SortKey.
    </p>
    <p>
      To test this on your exported xml file, using xml starlet, you can use the following
      command:
    </p>

<a name="doc_chap5_pre2"></a><table class="ntable" width="100%" cellspacing="0" cellpadding="0" border="0">
<tr><td class="infohead" bgcolor="#7a5ada"><p class="caption">
            Code listing 5.2: xml command to generate proper XML from plist file</p></td></tr>
<tr><td bgcolor="#ddddff"><pre>
xml makeProperXml.xsl "~/Music/iTunes/iTunes Music Library.xml" &gt; properiTunes.xml
</pre></td></tr>
</table>
      

    <p class="secthead"><a name="doc_chap5_sect2">Sorting the XML file per Album</a></p>
        <p>
            Remains the task of making the songlist XML file created in the previous
            section to an XML file that has album items: one node per album, containing
            a songlist in the correct order and all other information we could need to
            make HTML.  This is done using the makeMainXml.xsl file:
    	</p>
<a name="doc_chap5_pre3"></a><table class="ntable" width="100%" cellspacing="0" cellpadding="0" border="0">
<tr><td class="infohead" bgcolor="#7a5ada"><p class="caption">
            Code listing 5.3: makeMainXml.xsl file creates the main XML file</p></td></tr>
<tr><td bgcolor="#ddddff"><pre>
&lt;xsl:stylesheet
    xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
    xsl:version="1.0"&gt;

&lt;xsl:key name="album-sort-keys" match="song" use="SortKey" /&gt;            
&lt;xsl:template match="songlist"&gt;
  &lt;xmlLibrary&gt;
    &lt;xsl:for-each select="song[ count(. | key('album-sort-keys',SortKey)[1]) = 1]" &gt;
      &lt;xsl:sort select="SortKey"/&gt;
      &lt;xsl:variable name="albumid" select="position()"/&gt;
      &lt;includeXml&gt;&lt;xsl:value-of select="$albumid"/&gt;&lt;/includeXml&gt;
      &lt;xsl:text&gt;
      &lt;/xsl:text&gt;
      &lt;xsl:document href="{$destinationDir}/{$albumid}.xml"&gt;
      &lt;AlbumItem&gt;
   &lt;xsl:text&gt;
   &lt;/xsl:text&gt;
        &lt;Artist&gt;
          &lt;xsl:variable name="compilationval" select="count(child::Compilation)"/&gt;
          &lt;xsl:choose&gt;
            &lt;xsl:when test="$compilationval=1"&gt;
              &lt;xsl:text&gt;Various Artists&lt;/xsl:text&gt;
            &lt;/xsl:when&gt;
            &lt;xsl:when test="$compilationval=0"&gt;
              &lt;xsl:value-of select="Artist"/&gt;
            &lt;/xsl:when&gt;
            &lt;xsl:otherwise&gt;
              &lt;xsl:text&gt;????&lt;/xsl:text&gt;
            &lt;/xsl:otherwise&gt;
          &lt;/xsl:choose&gt;
        &lt;/Artist&gt;
   &lt;xsl:text&gt;
   &lt;/xsl:text&gt;
        &lt;Album&gt;
          &lt;xsl:value-of select="Album"/&gt;
        &lt;/Album&gt;
   &lt;xsl:text&gt;
   &lt;/xsl:text&gt;
        &lt;AlbumID/&gt;
   &lt;xsl:text&gt;
   &lt;/xsl:text&gt;
        &lt;Picture&gt;
      &lt;xsl:text&gt;
      &lt;/xsl:text&gt;
          &lt;PictureURL&gt;&lt;xsl:value-of
               select="Location" /&gt;&lt;/PictureURL&gt;
     &lt;xsl:text&gt;
   &lt;/xsl:text&gt;
        &lt;/Picture&gt;
     &lt;xsl:text&gt;
   &lt;/xsl:text&gt;
	        &lt;DateAdded&gt;&lt;xsl:value-of select="Date_Added"/&gt;&lt;/DateAdded&gt;
         &lt;xsl:text&gt;
         &lt;/xsl:text&gt;
	        &lt;Year&gt;&lt;xsl:value-of select="Year"/&gt;&lt;/Year&gt;
         &lt;xsl:text&gt;
         &lt;/xsl:text&gt;
            &lt;SortKey&gt;&lt;xsl:value-of select="SortKey"/&gt;&lt;/SortKey&gt;
         &lt;xsl:text&gt;
         &lt;/xsl:text&gt;
	&lt;TrackList&gt;
          &lt;xsl:for-each select="key('album-sort-keys',SortKey)" &gt;
            &lt;xsl:sort select="Track_Number" data-type="number" /&gt;
      &lt;xsl:text&gt;
      &lt;/xsl:text&gt;
	      &lt;Track&gt;
         &lt;xsl:text&gt;
         &lt;/xsl:text&gt;
	        &lt;Number&gt;&lt;xsl:value-of select="Track_Number"/&gt;&lt;/Number&gt;
         &lt;xsl:text&gt;
         &lt;/xsl:text&gt;
	        &lt;Name&gt;&lt;xsl:value-of select="Name"/&gt;&lt;/Name&gt;
         &lt;xsl:text&gt;
         &lt;/xsl:text&gt;
	        &lt;TotalTime&gt;&lt;xsl:value-of select="Total_Time"/&gt;&lt;/TotalTime&gt;
         &lt;xsl:text&gt;
         &lt;/xsl:text&gt;
	        &lt;DiscNumber&gt;&lt;xsl:value-of select="Disc_Number"/&gt;&lt;/DiscNumber&gt;
         &lt;xsl:text&gt;
         &lt;/xsl:text&gt;
	        &lt;PlayCount&gt;&lt;xsl:value-of select="Play_Count"/&gt;&lt;/PlayCount&gt;
      &lt;xsl:text&gt;
      &lt;/xsl:text&gt;
              &lt;/Track&gt;
	  &lt;/xsl:for-each&gt;
   &lt;xsl:text&gt;
   &lt;/xsl:text&gt;
	&lt;/TrackList&gt;
&lt;xsl:text&gt;
&lt;/xsl:text&gt;
      &lt;/AlbumItem&gt;
      &lt;/xsl:document&gt;
      &lt;xsl:text&gt;
      &lt;/xsl:text&gt;
    &lt;/xsl:for-each&gt;
  &lt;/xmlLibrary&gt;
&lt;/xsl:template&gt;

&lt;/xsl:stylesheet&gt;

</pre></td></tr>
</table>
        <p>
            Once again, for the XSL illeterate, a little explanation.  You can again ignore
            any empty <span class="code">xsl:text</span> element, which only serves to get some nicer formatting in
            the resulting XML file.  The actual sorting is done using a technique called
            <a href="http://www.jenitennison.com/xslt/grouping/muenchian.html">Muenchian Sorting</a>.
            The link explains it better than I can, so if you want to know what the <span class="code">xsl:key</span>
            is doing please read all about it there.
        </p>
            
<a name="doc_chap5_pre4"></a><table class="ntable" width="100%" cellspacing="0" cellpadding="0" border="0">
<tr><td class="infohead" bgcolor="#7a5ada"><p class="caption">
            Code listing 5.4: Making main XML file using xsltproc</p></td></tr>
<tr><td bgcolor="#ddddff"><pre>
xml makeMainXml.xsl properiTunes.xml &gt; masterXml.xml
</pre></td></tr>
</table>
        <p>
            The XML file is generating a set of XML files using the <span class="code">xsl:document</span> element
            which have sequential id's and a main XML file which include these XML files.  This
            will later be postprocessed by the <span class="code">generate.command</span> script which will generate
            new id's on a per album basis (more about that later), and rename the whole set
            of XML files.
    	</p>
    	<p>
    	    While generating XML files the relevant elements from the songlist are copied over
    	    to the album's XML file.
    	</p>
      
  <p class="chaphead">6. Getting the images out of the mp3 files</p>
        <p>
          The trickiest part of the job was getting the images.  Since
	  the images are not in the XML file we need to get them out
	  of the mp3 files themselves.  iTunes uses the correct mp3 v2
	  tag to store the image.  Now, initially I wrote a perl
	  script to extract the images based on a perl module.  But,
	  you need to install the perl modules MP3::Info and URI::URL
	  in order for this to work.  This is not too hard to do, but
	  is still some effort.  I could have packaged the perl
	  modules I guess, but I found it easier to create a little
	  Cocoa command line tool that does the same based on
	  <a href="http://id3lib.sourceforge.net/">libid3</a>,
	  the library that is distributed by <a href="http://www.id3.org">http://www.id3.org</a>.
	  Both approaches are
	  still explained however.
	</p>
      <p class="secthead"><a name="doc_chap6_sect1">Using a custom command line tool to get the image out of the mp3 file</a></p>
        <p>
	  Another approach is taken in the downloadable package however.  The getPicure
	  command is not a perl command, but a compiled tool, based on <a href="http://id3v2.sourceforge.net">id3v2</a> which already
	  uses the libid3 library and has a great set of functionalities, except... extracting
	  images.
	</p>
	<p>
	  Adapting the sources to eliminate all we don't need and adding the extra little bit
	  of functionality to extract the image was easy however, since we basically know
	  how to do this in perl already.  In order to compile it you will need to have the
	  libid3 headers in place and have a libid3 library that you can link to.  The commands
	  needed to compile it with the statically linked library are included in comments
	  in the source code.
	</p>
<a name="doc_chap6_pre1"></a><table class="ntable" width="100%" cellspacing="0" cellpadding="0" border="0">
<tr><td class="infohead" bgcolor="#7a5ada"><p class="caption">
            Code listing 6.1: Source code to getPicture command line tool</p></td></tr>
<tr><td bgcolor="#ddddff"><pre>
/**
 * Based on id3v2 ... compile something like
 *
 * g++ -I/usr/local/include/ -O3   -c -o getpic.o getpic.cpp
 * c++ -L/usr/local/lib/ -O3 -pedantic -Wall -framework CoreFoundation -lz -liconv
 *                       -g -o id3v2 getpic.o ./libid3.a
 * 
 * Part of CCTunes, distributed under the GPL.
 * details at http://www.coin-c.com/CCTunes/
 */

#include &lt;CoreFoundation/CoreFoundation.h&gt;

#include &lt;id3/misc_support.h&gt;
#include &lt;id3/tag.h&gt;

#include "frametable.h"
#include "genre.h"

int main( int argc, char *argv[]);
int main( int argc, char *argv[])
{
  bool tags = false;
  CFURLRef theSourceUrl = CFURLCreateWithBytes(kCFAllocatorDefault,
					       (unsigned char*)argv[1],
					       strlen(argv[1]),
					       kCFStringEncodingUTF8,
					       NULL);
  unsigned char sourceFilePath[500];
  if (CFURLGetFileSystemRepresentation(theSourceUrl,true,sourceFilePath,500))
    {

      ID3_Tag myTag;
      myTag.Link((char*)sourceFilePath, ID3TT_ID3V2);

      const ID3_Frame * myFrame = 0;
      const ID3_Tag myTagConstRef = myTag;
      ID3_Tag::ConstIterator *Iter = myTagConstRef.CreateIterator();
      for (size_t nFrames = 0; nFrames &lt; myTag.NumFrames(); nFrames++)
	{
	  myFrame = Iter-&gt;GetNext();
	  if (NULL != myFrame &amp;&amp; myFrame-&gt;GetID() == ID3FID_PICTURE)
	    {
	      myFrame-&gt;Field(ID3FN_DATA).ToFile(argv[2]);
	      tags = true;
	      break;
	    }
	}
    }
    if(!tags)
      std::cout &lt;&lt; "&lt;warning&gt;&lt;id&gt;no_picture&lt;/id&gt;&lt;info&gt;" &lt;&lt; (unsigned char*)argv[1]
                &lt;&lt; "&lt;/info&gt;&lt;/warning&gt;" &lt;&lt; std::endl;
}


</pre></td></tr>
</table>
      <p class="secthead"><a name="doc_chap6_sect2">Generating Thumbnails</a></p>
      <p>
        This might be all you need if you are on your own private server, have lots of
        disk space and don't really care on how fast your collection loads in the browser.
        Since I have been using this, I found that the size of the images tends to be too
        big to view all of the images for all of the albums at once, so it would be
	nice to generate thumbnails for the overview.
      </p>

      <p>
        However, for your ease of use, the currently downloadable package comes with a little
	command line tool programmed in cocoa and based on <a href="http://evanjones.ca/pdf2png.m">
	pdf2png by Evan Jones</a> which does all of this for you.  It simply takes an image
	and draws it in an offline buffer of the specified size and saves that as a png
	file.  I must say however, you will see that the quality is <span class="emphasis">not good</span>.  It is
	the same quality you can see if you use iPhoto to look at the images you've
	taken with your digital camera.  Uuuugly.  I must provide some feedback to Apple on that
	someday.
      </p>

<a name="doc_chap6_pre2"></a><table class="ntable" width="100%" cellspacing="0" cellpadding="0" border="0">
<tr><td class="infohead" bgcolor="#7a5ada"><p class="caption">
            Code listing 6.2: Little Cocoa command line tool to resize images, based on pdf2png</p></td></tr>
<tr><td bgcolor="#ddddff"><pre>
// A tiny program that resizes images to PNG images with certain dimensions.
// based on pdf2png by Evan Jones, http://evanjones.ca/pdf2png.m
// modified by Kristof Van Landschoot, Coin-C to fit the purpose of resizing.
//
// gcc --std=c99 -g -o resize resize.m -framework Cocoa
//
// Written originally by Evan Jones &lt;ejones@uwaterloo.ca&gt; Februrary, 2004
// http://www.eng.uwaterloo.ca/~ejones/
//
// Released under the GNU Public License

#include &lt;Cocoa/Cocoa.h&gt;

int main( int argc, char* argv[] )
{
	int destinationSize = 36; // in DPI

	int page = 1;
	
	NSAutoreleasePool *pool = [[NSAutoreleasePool alloc] init];
	
	// Package all arguments as NSStrings in an NSArray
	NSMutableArray* args = [NSMutableArray arrayWithCapacity: argc - 1];
	for ( int i = 1; i &lt; argc; ++ i )
	{
		[args addObject: [NSString stringWithCString: argv[i]] ];
	}
	
	// If we have a "--dpi" along with a corresponding argument ...
	unsigned int index = NSNotFound;
	if ( (index = [args indexOfObject: @"--dpi"]) != NSNotFound &amp;&amp; index + 1 &lt; [args count] )
	{
		// Parse it as an integer
		destinationSize = [[args objectAtIndex: index + 1] intValue];
		[args removeObjectAtIndex: index + 1];
		[args removeObjectAtIndex: index];
	}
	
	if ( [args count] != 2 || [args indexOfObject: @"--help"] != NSNotFound || destinationSize &lt;= 0 )
	{
		fprintf( stderr, "resizePicture [options] file\n" );
		fprintf( stderr, "\t--dpi dpi\tSpecifies the destination size of the image in pixels\n" );
		fprintf( stderr, "\t--help\tPrint this help message\n" );
		return 1;
	}
	
	NSString* sourcePath = [args objectAtIndex: 0];
	NSImage* source = [ [NSImage alloc] initWithContentsOfFile: sourcePath ];
	[source setScalesWhenResized: YES];
	
	// Tip from http://www.omnigroup.com/mailman/archive/macosx-dev/2002-February/023366.html
	// Allows setCurrentPage to do anything
	[source setDataRetained: YES];
	
	if ( source == nil )
	{
		fprintf( stderr, "Source image '%s' could not be loaded\n", argv[1] );
		return 2;
	}
	
	// The output file name
	NSString* outputFilePath = [args objectAtIndex: 1];
	
	NSSize sourceSize = [source size];
		
	NSSize size = NSMakeSize( destinationSize, destinationSize );
	
	[NSApplication sharedApplication];
	[[NSGraphicsContext currentContext] setImageInterpolation: NSImageInterpolationHigh];
	
	[source setSize: size];
	NSRect destinationRect = NSMakeRect( 0, 0, size.width, size.height );
	
	NSImage* image = [[NSImage alloc] initWithSize:size];
	[image lockFocus];
	    
	NSEraseRect( destinationRect );
	[source drawInRect: destinationRect
		fromRect: destinationRect
		operation: NSCompositeCopy fraction: 1.0];
	
	NSBitmapImageRep* bitmap = [ [NSBitmapImageRep alloc]
				     initWithFocusedViewRect: destinationRect ];
	
	NSData* data = [bitmap representationUsingType:NSPNGFileType properties:nil];
	[bitmap release];
	
	[[NSFileManager defaultManager]
	  createFileAtPath: outputFilePath
	  contents: data
	  attributes: nil ];
	
	[image unlockFocus];
	[image release];
	[pool release];
}

</pre></td></tr>
</table>

    <p class="chaphead">7. Naming Files</p>
    <p class="secthead"><a name="doc_chap7_sect1">Introduction</a></p>
      <p>
        During the development of CCTunes various options were implemented
	to name the files.  The initial, and simplest, option was to just
	use the "Track ID" that is generated from iTunes to name the albums.
      </p>
      <p>
        This had various drawbacks, the most one being that these id's are on
	a per track basis.  So, from one generation to the next, it would
	mean the HTML files in your library would receive a different id.
	Also, as I move my mp3 files from one share to another, or from my
	iPod to my computer, quite oftenly, these track id's did not remain
	the same in my library.
      </p>
      <p>
        In conclusion, I thought this method was not suited for the job.  So,
	I implemented another one.
      </p>
      
    <p class="secthead"><a name="doc_chap7_sect2">First Attempt - MD5 Sums</a></p>
      <p>
        When you're a bit familiar with md5 sums, the first thing that comes
	to mind in situations like these is: md5-sums.  They are a hash based
	on the data of the album, so it would mean that whenever something in
	the album data changed, the album id would also change.  If you combine
	that with a version control system (Subversion), like I do, it immediately
	means that it's easy to follow the changes in your album collection.
      </p>
      <p>
        There are drawbacks to this approach too.  The md5 sums are quite meaningless
	and rather long.  They can, on top of this, be the same for two different
	albums so a mechanism would be needed to give a warning when the ids of two
	different albums are the same.
      </p>
      <p>
        So, this was not the method implemented in the current version.  It is still
	present in the <span class="code">createId.command</span> file in the package, after the exit,
	though, should you be interested in it.
      </p>
      
    <p class="secthead"><a name="doc_chap7_sect3">Use what is there: cddb id's</a></p>
      <p>
        But, there is a mechanism implemented to do something like md5 on albums for
	music, and it is a commonly accepted method to create an id like md5, but
	more suited for music albums.  It's the CDDB mechanism.  Not that it's
	free from criticism either, this one.  One of the first things I encountered
	on google was a fairly harsh criticism on the way the hash sums are calculated.
      </p>
      <p>
        It wasn't that it was easy to find the way it's calculated either.  It's open
	source, but documented only by means of the source.  And, most of the packages
	creating such an id did an immediate lookup on either freedb or gracenote servers
	and used the data directly read from the CD, using lead in times that did not seem
	like they could be retrieved from the ripped mp3 data.
      </p>
      <p>
        In the end, I found a package generating an id from mp3 data, and it did not seem
	to need any information from the CD itself.  I don't know if it will create correct
	id's in any case, but it looks like the closest I can get for now.  I'll explain
	why I think it will never create correct id's.
      </p>
      <p>
        Here is the script that is finally generating the id's.
<a name="doc_chap7_pre1"></a><table class="ntable" width="100%" cellspacing="0" cellpadding="0" border="0">
<tr><td class="infohead" bgcolor="#7a5ada"><p class="caption">
            Code listing 7.1: Generating freedb id's on a per album basis</p></td></tr>
<tr><td bgcolor="#ddddff"><pre>
#!/usr/bin/perl        
# Returns the disc ID as a string.

use POSIX;

sub cddb_sum
{
	my ($n, $ret) = (shift, 0);
	for (split //, $n) { $ret += $_ }
	return $ret;
}

sub cddb_discid
{
        # kvl this is where the party's at ... using get_mp3info higher on to populate cdtoc
	my @cdtoc	   = @_;
	my $n		   = 0;
	my $total_time = 0;
	
	foreach my $track (@cdtoc)
	{
		my $track_time = floor($track+.5);
                # print "track time: "; print $track_time; print "\n";
		$n			+= &amp;cddb_sum($total_time);
		$total_time +=			 $track_time;
	}
	return sprintf("%08x", ($n % 0xFF) &lt;&lt; 24 | $total_time &lt;&lt; 8 | @cdtoc);
}

$calci = 0;
foreach $calced (@ARGV)
{
  $calcarr[$calci] = $ARGV[$calci] / 1000;
  $calci = $calci + 1;
}

print cddb_discid ( @calcarr );

print "\n";

</pre></td></tr>
</table>
      </p>
      
    <p class="secthead"><a name="doc_chap7_sect4">Why the id's don't correspond</a></p>
      <p>
        An explanation of how the cddb id's are calculated can be found at <a href="http://www.freedb.org/modules.php?name=Sections&amp;sop=printpage&amp;artid=6">freedb.org</a>.
        As can be seen there, the only thing that matters is the number of tracks and
        the track durations.  There is a little program at <a href="http://jeremy.zawodny.com/c/discid/">
        http://jeremy.zawodny.com/c/discid/</a> that you can use to generate discid's,
        or to verify what is going on in our case.  We need to get the information out
        of the mp3's, or out of the iTunes XML file.  This turned out to be troublesome.
      </p>
      <p>
        As an example, I will try to explain the calculation of Morrissey's Kill Unkle
    album.  Not because it's particularly special, just because the CD was lying around
    at the time I tried these things, so it's good to set as an example.
      </p>
      <p>
        We get timings from different sources.  The iTunes GUI of course.  Also from
        the iTunes XML file, which is where we would prefer to get the timings, this
        is after all XML manipulation based.  But also from discid, which is reading
        the Table Of Content directly from the CD.  I needed to manipulate discid a
        bit to get it to print the timings, but that was not too difficult to do.  And
        last the <a href="http://www.freedb.org/freedb_search_fmt.php?cat=rock&amp;id=7307c30a">
        timings from the freedb website itself</a>.
      </p>
      <table class="ntable">
<tr>
<td bgcolor="#7a5ada" class="infohead"><b>Track Number</b></td>
                 <td bgcolor="#7a5ada" class="infohead"><b>Time in ms from iTunes XML</b></td>
                 <td bgcolor="#7a5ada" class="infohead"><b>Time in m:ss from freedb website</b></td>
                 <td bgcolor="#7a5ada" class="infohead"><b>Time in seconds from discid</b></td>
                 <td bgcolor="#7a5ada" class="infohead"><b>Time in m:ss from iTunes UI</b></td>
                 <td bgcolor="#7a5ada" class="infohead"><b>Cumulative ms from rounding down iTunes XML values</b></td>
                 <td bgcolor="#7a5ada" class="infohead"><b>Cumulative ms from rounding iTunes XML values</b></td>
             </tr>
        <tr>
<td bgcolor="#ddddff" class="tableinfo">0</td>
<td bgcolor="#ddddff" class="tableinfo"></td>
<td bgcolor="#ddddff" class="tableinfo"></td>
<td bgcolor="#ddddff" class="tableinfo">2</td>
<td bgcolor="#ddddff" class="tableinfo"></td>
<td bgcolor="#ddddff" class="tableinfo"></td>
<td bgcolor="#ddddff" class="tableinfo"></td>
</tr>
        <tr>
<td bgcolor="#ddddff" class="tableinfo">1</td>
<td bgcolor="#ddddff" class="tableinfo">205061</td>
<td bgcolor="#ddddff" class="tableinfo">3:25</td>
<td bgcolor="#ddddff" class="tableinfo">205</td>
<td bgcolor="#ddddff" class="tableinfo">3:25</td>
<td bgcolor="#ddddff" class="tableinfo">61</td>
<td bgcolor="#ddddff" class="tableinfo">61</td>
</tr>
        <tr>
<td bgcolor="#ddddff" class="tableinfo">2</td>
<td bgcolor="#ddddff" class="tableinfo">201743</td>
<td bgcolor="#ddddff" class="tableinfo">3:22</td>
<td bgcolor="#ddddff" class="tableinfo">202</td>
<td bgcolor="#ddddff" class="tableinfo">3:21</td>
<td bgcolor="#ddddff" class="tableinfo">804</td>
<td bgcolor="#ddddff" class="tableinfo">-196</td>
</tr>
        <tr>
<td bgcolor="#ddddff" class="tableinfo">3</td>
<td bgcolor="#ddddff" class="tableinfo">209084</td>
<td bgcolor="#ddddff" class="tableinfo">3:29</td>
<td bgcolor="#ddddff" class="tableinfo">209</td>
<td bgcolor="#ddddff" class="tableinfo">3:29</td>
<td bgcolor="#ddddff" class="tableinfo">888</td>
<td bgcolor="#ddddff" class="tableinfo">-112</td>
</tr>
        <tr>
<td bgcolor="#ddddff" class="tableinfo">4</td>
<td bgcolor="#ddddff" class="tableinfo">212741</td>
<td bgcolor="#ddddff" class="tableinfo">3:33</td>
<td bgcolor="#ddddff" class="tableinfo">212</td>
<td bgcolor="#ddddff" class="tableinfo">3:32</td>
<td bgcolor="#ddddff" class="tableinfo">1629</td>
<td bgcolor="#ddddff" class="tableinfo">-371</td>
</tr>
        <tr>
<td bgcolor="#ddddff" class="tableinfo">5</td>
<td bgcolor="#ddddff" class="tableinfo">176666</td>
<td bgcolor="#ddddff" class="tableinfo">2:57</td>
<td bgcolor="#ddddff" class="tableinfo">177</td>
<td bgcolor="#ddddff" class="tableinfo">2:56</td>
<td bgcolor="#ddddff" class="tableinfo">2295</td>
<td bgcolor="#ddddff" class="tableinfo">-705</td>
</tr>
        <tr>
<td bgcolor="#ddddff" class="tableinfo">6</td>
<td bgcolor="#ddddff" class="tableinfo">119797</td>
<td bgcolor="#ddddff" class="tableinfo">2:00</td>
<td bgcolor="#ddddff" class="tableinfo">120</td>
<td bgcolor="#ddddff" class="tableinfo">1:59</td>
<td bgcolor="#ddddff" class="tableinfo">3092</td>
<td bgcolor="#ddddff" class="tableinfo">-908</td>
</tr>
        <tr>
<td bgcolor="#ddddff" class="tableinfo">7</td>
<td bgcolor="#ddddff" class="tableinfo">203363</td>
<td bgcolor="#ddddff" class="tableinfo">3:23</td>
<td bgcolor="#ddddff" class="tableinfo">203</td>
<td bgcolor="#ddddff" class="tableinfo">3:23</td>
<td bgcolor="#ddddff" class="tableinfo">3455</td>
<td bgcolor="#ddddff" class="tableinfo">-545</td>
</tr>
        <tr>
<td bgcolor="#ddddff" class="tableinfo">8</td>
<td bgcolor="#ddddff" class="tableinfo">334602</td>
<td bgcolor="#ddddff" class="tableinfo">5:34</td>
<td bgcolor="#ddddff" class="tableinfo">334</td>
<td bgcolor="#ddddff" class="tableinfo">5:34</td>
<td bgcolor="#ddddff" class="tableinfo">4057</td>
<td bgcolor="#ddddff" class="tableinfo">-943</td>
</tr>
        <tr>
<td bgcolor="#ddddff" class="tableinfo">9</td>
<td bgcolor="#ddddff" class="tableinfo">211800</td>
<td bgcolor="#ddddff" class="tableinfo">3:32</td>
<td bgcolor="#ddddff" class="tableinfo">212</td>
<td bgcolor="#ddddff" class="tableinfo">3:31</td>
<td bgcolor="#ddddff" class="tableinfo">4857</td>
<td bgcolor="#ddddff" class="tableinfo">-1143</td>
</tr>
        <tr>
<td bgcolor="#ddddff" class="tableinfo">10</td>
<td bgcolor="#ddddff" class="tableinfo">112431</td>
<td bgcolor="#ddddff" class="tableinfo">1:52</td>
<td bgcolor="#ddddff" class="tableinfo">113</td>
<td bgcolor="#ddddff" class="tableinfo">1:52</td>
<td bgcolor="#ddddff" class="tableinfo">5288</td>
<td bgcolor="#ddddff" class="tableinfo">-712</td>
</tr>
      </table>
      <p>
        In the first column we can see the entries from the XML file.  It turns out this
        is stored in milliseconds, so divide them by 1000 to convert to seconds.  The
        difference between these values and the values from the iTunes UI are immediately
        showing the strange uncorrelatedness of these figures: Track 2 seems to indicate
        we need to round down, track 4 seems to indicate the opposite.  So no simple rule
        to go from one to another.
      </p>
      <p>
        The second column shows the entries from the freedb website.  They would seem to
        be correct nearest integer rounding, if it wasn't for track 8, which is all of a sudden rounded
        down even though it would seem to be necessary to round it to 335s instead of
        334s.  Also the relation with the discid timings is interesting, because discid
        is the only program tried to give me the correct ID.  The CD
        table of content has a lead in, which is the time in seconds at which the first
        track starts.  This is indicated in the table as the duration of track 0.  Also
        here, there is no simple correlation between the values from the XML file
        and the values from discid: track 1 to 3 seem to indicate a rounding to
        the nearest int, but track 4 denies this rule by all of a sudden expecting a
        rounding down.
      </p>
      <p>
        So, how to proceed?  It could be an interesting idea to inspect the cumulative rounding values,
        I've included them in the last two columns for rounding down and rounding to the
        nearest integer.  Neither of the two columns seem to be giving a key to the solution
        of the problem, but maybe I'm just missing things.
      </p>
      <p>
        So, for now, we will stick to rounding to the nearest integer, which gives us
        a pretty close ID, but not an exact match.  Any ideas on getting an exact
        match are welcome.  For now, for the example we get a freedb id of 7907c40a
        instead of the expected 7307c30a.  You will have to admit it's similar.
      </p>
      <p>
        Todo: something about <a href="http://home.t-online.de/home/schweiger.A/english/home.html">MP3Browser</a>
      </p>
      <p>
        Todo: url's for the cddb-id perl script.
      </p>
      
    <p class="chaphead">8. Making HTML</p>
        <p>
        One little stage is still left, and that
	is formatting the XML files so that they make nice HTML files that we can render
	in a browser.  A full explanation of all things you can do in XSL is out of the
	scope of this document, but this very basic style sheet should provide a good
	starting point for anyone willing to get his or her hands dirty.
	    </p>
<a name="doc_chap8_pre1"></a><table class="ntable" width="100%" cellspacing="0" cellpadding="0" border="0">
<tr><td class="infohead" bgcolor="#7a5ada"><p class="caption">
            Code listing 8.1: This very basic XSL style sheet creates a list of all albums in the libary</p></td></tr>
<tr><td bgcolor="#ddddff"><pre>
&lt;xsl:stylesheet
        xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
        xsl:version="1.0"&gt;
            
  &lt;xsl:key name="album-sort-keys" match="AlbumItem" use="SortKey" /&gt;
  &lt;xsl:template match="xmlLibrary"&gt;
    &lt;html&gt;
      &lt;head&gt;
        &lt;title&gt;Music Library - Exported from iTunes&lt;/title&gt;
      &lt;/head&gt;
      &lt;body&gt;
        &lt;xsl:for-each select="AlbumItem"&gt;
          &lt;xsl:sort select="SortKey"/&gt;
          &lt;xsl:value-of select="Album" /&gt; - &lt;xsl:value-of select="Artist" /&gt;&lt;br/&gt;
        &lt;/xsl:for-each&gt;
      &lt;/body&gt;
    &lt;/html&gt;
  &lt;/xsl:template&gt;
&lt;/xsl:stylesheet&gt;

</pre></td></tr>
</table>
    <p>
      This style sheet basically consists of only a couple of processing instructions
      that are specific to XSL.  Anyone that has ever seen some HTML should be able
      to recognize the HTML structure within this style sheet: the &lt;html&gt; section,
      the &lt;head&gt; and the &lt;body&gt; are there.
    </p>
    <p>
      In the body there is just one big loop, indicated by the xsl:for-each tag.  The
      first instruction indicates how to get the albums sorted - there is a key ready
      for your usage in the XML that is generated by the script, and using the
      &lt;xsl:value-of&gt; directive, it selects artist and album, prints a dash in
      between them and a newline (&lt;br&gt;) after it.
    </p>
    <p>
      How easy can it be?  You can start from this to lay out the HTML like you want
      it and use the other XSL files in the package for further inspiration to do the
      trickier things.  Good luck!
    </p>
    <p class="chaphead">9. One Simple Package</p>
      <p>
        The final bash script that does everything is, now that we've outlined
        the techniques, a pretty straightforward bash script.
      </p>

<a name="doc_chap9_pre1"></a><table class="ntable" width="100%" cellspacing="0" cellpadding="0" border="0">
<tr><td class="infohead" bgcolor="#7a5ada"><p class="caption">
            Code listing 9.1: generate.command bash script does it all</p></td></tr>
<tr><td bgcolor="#ddddff"><pre>
#!/bin/bash

debug=0

if [ $debug -ne 0 ]; then
  echo "0 [$0] 1 [$1] 2 [$2] 3 [$3] 4[$4]" &gt; /tmp/debuginfo
fi

# get my location (don't worry about this one)
# this one is used by other scripts too
export set WORKINGDIR=`dirname "$0"`

# "/Users/kristof/Desktop/Library.xml" for instance
musicXmlFile="$1"

# "/Users/kristof/Desktop/New Folder" for instance
destinationDir="$2"
destinationDirUrl=`"${WORKINGDIR}/urlencode.sh" "$2"`

# makeFinalXHtml.xsl or makeListXHtml.xsl
styleSheet="$3"

"${WORKINGDIR}/xml" tr "${WORKINGDIR}/../xml/makeProperXml.xsl" \
	"$musicXmlFile" \
	&gt; /tmp/mymusic$$.xml

"${WORKINGDIR}/xml" tr "${WORKINGDIR}/../xml/makeMainXml.xsl" \
    -s "destinationDir=$destinationDirUrl" \
    /tmp/mymusic$$.xml &gt; /tmp/mymusic2$$.xml

# get list with old id's, the ones that were assigned on a starting with number one basis
OLDIDS=`"${WORKINGDIR}/xml" sel -T -t -m xmlLibrary/includeXml -v "concat(node(),' ')" /tmp/mymusic2$$.xml`

echo "&lt;?xml version=\"1.0\"?&gt;" &gt; "${destinationDir}/mymusic.xml"
echo "&lt;xmlLibrary xmlns:xi=\"http://www.w3.org/2001/XInclude\"&gt;" &gt;&gt; "${destinationDir}/mymusic.xml"

for oldit in $OLDIDS; do
    file="${oldit}.xml"
    PICTUREURL=`"${WORKINGDIR}/../bin/xml" sel -T -t -v /AlbumItem/Picture/PictureURL \
        "${destinationDir}/${file}"`
    NEWID=`"${WORKINGDIR}/createId.command" "${destinationDir}/$file"`
    "${WORKINGDIR}/getPicture" "${PICTUREURL}" "${destinationDir}/${NEWID}-high"
    "${WORKINGDIR}/resizePicture" --dpi 60 "${destinationDir}/${NEWID}-high" \
        "${destinationDir}/${NEWID}-low.png"
    "${WORKINGDIR}/xml" ed -u /AlbumItem/AlbumID -v "$NEWID" "${destinationDir}/$file" \
        &gt; "${destinationDir}/${NEWID}.xml"
    rm -f "${destinationDir}/$file"
    "${WORKINGDIR}/xml" tr --xinclude \
        "${WORKINGDIR}/../../Resources/English.lproj/makeFinalXHtmlDetail.xsl" \
	    "${destinationDir}/${NEWID}.xml" &gt; "${destinationDir}/${NEWID}.html"
    echo "&lt;xi:include href=\"${NEWID}.xml\" /&gt;" &gt;&gt; "${destinationDir}/mymusic.xml"
done

echo "&lt;/xmlLibrary&gt;" &gt;&gt; "${destinationDir}/mymusic.xml"

# for mymusic.xml file, apply main stylesheet to obtain index file

"${WORKINGDIR}/xml" tr --xinclude "${WORKINGDIR}/../../Resources/English.lproj/${styleSheet}.xsl" \
   "${destinationDir}/mymusic.xml" &gt; "${destinationDir}/mymusic.html"

/bin/cp "${WORKINGDIR}/../../Resources/default.css" "${destinationDir}/default.css"

/usr/bin/open "${destinationDir}/mymusic.html"

if [ $debug -eq 0 ]; then
  /bin/rm /tmp/mymusic$$.xml
  /bin/rm /tmp/mymusic2$$.xml
fi

</pre></td></tr>
</table>
      <p>
        For to those that like it, having a command line script is nice.  You can
        use it for your scripting, without have to figure out what AppleEvents you
        should signal an application using AppleScript.  Those that have ever done
        anything like this will appreciate to have a command line script ready to
        trigger from the crontab.
      </p>
      <p>
        And those that don't just use the package, which is just a GUI wrapper around
        this script.  You can fill in the arguments with a intuitive interface and
        everything should work as expected.
        If nothing goes wrong that is... feedback is still a bit underdeveloped at
        the moment in the GUI.
      </p>
    <p class="chaphead">10. Tips and Tricks</p>
    <p class="secthead"><a name="doc_chap10_sect1">Making your own template</a></p>
      <p>
        Making your own template is not too difficult.  Two templates are
	provided already.  You might want to read up on the XSLT specification,
	and you may want to peek into the generate.command script which is in
	the CCTunes package.
      </p>
      <p>
        If you need any help, asking will never hurt.  I don't always have time
	to answer everything, but you may be lucky.  If you feel like giving
	back the template once it's finished that would be nice.  If you want
	to link to me for giving inspirational credit, that would be nice too.
      </p>
      
    <p class="secthead"><a name="doc_chap10_sect2">Combining templates</a></p>
      <p>
        At the moment there are two templates.  One for making a list-like
	html page, and one for making a "peephole" view of the library in
	one big html page.  These two approaches can be combined by using
	the same destination folder for outputting.
      </p>
      
    <p class="secthead"><a name="doc_chap10_sect3">Avoiding strange characters</a></p>
        At <a href="http://www.dommel.com/">my Hosting Provider</a>, they have set the
        encoding of HTML files to be sent via the headers as ISO-8859-1, but the HTML files
        are encoded in UTF-8.  Since <a href="http://www.mozilla.com/">my browser</a>
        prefers to look at the http headers, I needed to convert the html files to php
        files with a correct header being sent.  Not difficult to do, as this little
        script will show, but interesting to know.
<a name="doc_chap10_pre1"></a><table class="ntable" width="100%" cellspacing="0" cellpadding="0" border="0">
<tr><td class="infohead" bgcolor="#7a5ada"><p class="caption">
            Code listing 10.1: Converting html files to php files with UTF-8 encoding header</p></td></tr>
<tr><td bgcolor="#ddddff"><pre>
#!/bin/bash

ALLHTMLFILES=`ls *.html`
for i in ${ALLHTMLFILES}; do
  FILENAME=`echo $i | sed s/\.html$//g`
  echo "&lt;? header('Content-Type: text/html; charset=utf-8'); ?&gt;" &gt; ${FILENAME}.php
  cat ${FILENAME}.html &gt;&gt; ${FILENAME}.php
done
</pre></td></tr>
</table>
      
    <p class="secthead"><a name="doc_chap10_sect4">Using ImageMagic or GraphicConverter</a></p>
      <p>
        If you are dissatisfied with the quality of the small images in the
	peephole view, like I am, you can choose to use <a href="http://www.imagemagick.org/">ImageMagick</a> to
	convert the images from higher size to lower size.
      </p>
      <p>
	You will need to install it using fink or compile
	it yourself, both should be easy and with a simple set of commands on the prompt
	you convert all images like this:
      </p>

<a name="doc_chap10_pre2"></a><table class="ntable" width="100%" cellspacing="0" cellpadding="0" border="0">
<tr><td class="infohead" bgcolor="#7a5ada"><p class="caption">
            Code listing 10.2: Generating thumbnails with ImageMagick convert</p></td></tr>
<tr><td bgcolor="#ddddff"><pre>
find outputdir -name *-high -type f -exec convert -resize 60x60 {} {}-low.png \;
</pre></td></tr>
</table>

      <p>
        If you have a utility like GraphicConverter, which came for free with my laptop,
	you can easily generate 60 by 60 thumbnails from the images by using the batch
	mode to set the Max Size. 
      </p>

      
    <p class="secthead"><a name="doc_chap10_sect5">Using perl to get the images out of the mp3 files</a></p>
<table class="ncontent" width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td bgcolor="#ffbbbb"><p class="note"><b>Warning: </b>This section is outdated with respect to CCTunes.  It is here for
documentation purposes only.
</p></td></tr></table>
        <p> It used to be so that the images were extracted from the MP3
            files using perl libraries and a little perl script.  This is
            how it was done.
        </p>
        <p>
	  A link that got me on the way was on the ever interesting
	  macosxhints website, 
	  <a href="http://www.macosxhints.com/article.php?story=20030429003250559">http://www.macosxhints.com/article.php?story=20030429003250559</a>,
	  in which one of the comments describes almost perfectly what needs to be
	  done.  Almost, but for the fact on how to get to open a file based on the
	  url.  Of course, this is not hard to do, using some parsing, and I have
	  my "Perl in a Nutshell" book on my desktop, but getting used to this perl
	  thing I thought there must be a module already out there that does this
	  for me.  Now, that's the URI::URL module we've installed, and it was
	  mentioned in the book.
	</p>
	<p>
	  There we have our perl script, which takes as argument a unix file path
	  and a filename to write the png file to.  If this script does not find
	  the corresponding tag, it just creates a link to a nopic.png file instead
	  of the destination file, so that we can put in a nice icon when the image
	  is missing in the mp3.
	</p>
<a name="doc_chap10_pre3"></a><table class="ntable" width="100%" cellspacing="0" cellpadding="0" border="0">
<tr><td class="infohead" bgcolor="#7a5ada"><p class="caption">
            Code listing 10.3: The getPicture script gets the image from the mp3 file</p></td></tr>
<tr><td bgcolor="#ddddff"><pre>
#!/usr/bin/perl

no strict 'refs';
use Getopt::Long;
use IO::File;
use MP3::Info;
use URI::URL;

$url1 = new URI::URL shift;
$unixpath = $url1-&gt;unix_path();
$e = $ARGV[0];
if ( -e $e || -l $e ) {
    system("/bin/rm " . $e);
}
if (my $mp3tag_id3v2 = get_mp3tag($unixpath, 2, 1)) {
    my $tag = "PIC";
    my $result = $mp3tag_id3v2-&gt;{$tag};
    $result =~ s/^(.....).//;
    if (length($result) &gt; 0)
    {
      open $f, "&gt; $e";
      print $f $result;
    }
    else
    {
      system("/bin/ln -s ./nopic.png " . $e);
    }
}
else
{
   system("/bin/ln -s ./nopic.png " . $e);
}
</pre></td></tr>
</table>
        <p>
        To invoke this for the set of MP3's that the library existed of, a little hack
        was needed which added a little comment in the XML file so that when grepping
        for the getPicture command a bash script was generated that used the perl script
        to extract all the images.
        </p>
        <p>
	  I have understood that a Microsoft implementation of the XSLT parsing implements
	  something like callbacks, in which you can call a script from within your
	  XSL file.  That's a good idea, nice, but since it isn't in the XSLT specification
	  it is not very compatible to depend upon it.  But if you do, you might want
	  to check that out.  The approach described did work too, however.
	</p>
      
    <p class="chaphead">11. Conclusion</p>
    <p>
      So, if you want to do a quick XHTML list of your mp3 collection, you need not do
      much.  If you want, there is a <a href="http://www.coin-c.com/CCTunes/cct-download.html">package that
      you can download</a>, and hopefully with the explanations given here you
      are even able to adapt everything to your needs.
    </p>
    <p class="chaphead">12. Future Wishlist and Todo</p>
    <p>
      In the beginning I was doing this to get to know something about XSLT and about
      perl scripting etc... However, things have evolved in the Cocoa direction and
      it has proven to be a good choice so far, since with little programming effort
      a very nice result was delivered.  Things are pretty much the way I want them
      to be, so don't expect any drastic changes.
    </p>
    <p>
      A short list of the things I want to do however:
    <ul>
      <li>A way to show the play count, which is usually a good measure on how much I like
          an album I bought.  Related to this, a way to merge the xml files, since I listen
    	  to albums both at work as home.</li>
      <li>You still need the iTunes xml file.  It would be nice if it could take extra information
          from this XML file, but get the main information from the mp3 files itself.</li>
      <li>One XSL template to do the whole transformation.</li>
      <li>Jaguar, Tiger versions.  A Windows version, why not?</li>
      <li>Probably even more...</li>
    </ul>
    </p>
    <p>
      And a short list of the things I <span class="emphasis">need</span> to do:
      <ul>
        <li>Update documentation to reflect the current state of CCTunes.</li>
    	<li>Make sure versioning is in place.</li>
	    <li>Provide older versions online.</li>
      </ul>
    </p>
    <p>
      And a list of things I won't do (and why):
      <ul>
        <li>There are handy applications to get the Album's artwork into iTunes.  CCTunes will
            not try to replace those, since for those that want to use Free Software, Clutter
            is available at sourceforge and does the job.  A shareware application that, amongst
            other things, also does this is Synergy.</li>
      </ul>
    </p>
    <p class="chaphead">13. Resources</p>
<p class="secthead"><a name="doc_chap13_sect1">Downloading all the scripts</a></p>
        These scripts can be found in the package of the application at
	<a href="http://www.coin-c.com/CCTunes/cct-download.html">http://www.coin-c.com/CCTunes/cct-download.html</a>.
	Surely you could copy and paste everything from this file, but downloading and untarring is a
	bit safer, since sometimes the whitespace is important.
      <p class="secthead"><a name="doc_chap13_sect2">Resources used in this article</a></p>
        <table class="ntable">
	  <tr>
	    <td bgcolor="#7a5ada" class="infohead"><b>
	      Link
	    </b></td>
	    <td bgcolor="#7a5ada" class="infohead"><b>
	      Description
	    </b></td>
	  </tr>
	  <tr>
            <td bgcolor="#ddddff" class="tableinfo">
	      <a href="http://www.w3.org/TR/xslt#key">http://www.w3.org/TR/xslt#key</a>
	    </td>
	    <td bgcolor="#ddddff" class="tableinfo">
	      The XSLT specification.  It is the dry stuff, the spec and just the spec.
	    </td>
	  </tr>
	  <tr>
            <td bgcolor="#ddddff" class="tableinfo">
	      <a href="http://www.jenitennison.com/xslt/grouping/muenchian.html">http://www.jenitennison.com/xslt/grouping/muenchian.html</a>
	    </td>
	    <td bgcolor="#ddddff" class="tableinfo">
	      This could be a helpful technique to aid in speeding up the XML parsing
	      we are doing.  To be investigated.
	    </td>
	  </tr>
	  <tr>
            <td bgcolor="#ddddff" class="tableinfo">
	      <a href="http://www.xmldatabases.org/WK/blog/1086?t=item">http://www.xmldatabases.org/WK/blog/1086?t=item</a>
	    </td>
	    <td bgcolor="#ddddff" class="tableinfo">
	      This is the article that tells about how to clean up the property list
	      that iTunes has as an XML file.
	    </td>
	  </tr>
	  <tr>
	    <td bgcolor="#ddddff" class="tableinfo">
	      <a href="http://www.oreillynet.com/lpt/wlg/3130">http://www.oreillynet.com/lpt/wlg/3130</a>
	    </td>
	    <td bgcolor="#ddddff" class="tableinfo">
	      Nice article about what's in iTunes, and how.
	    </td>
	  </tr>
	  <tr>
	    <td bgcolor="#ddddff" class="tableinfo">
	      <a href="http://www.macosxhints.com/article.php?story=20030429003250559">http://www.macosxhints.com/article.php?story=20030429003250559</a>
	    </td>
	    <td bgcolor="#ddddff" class="tableinfo">
	      A tip about how to get images from iTunes, in which the perl hint occurs.
	    </td>
	  </tr>	  
	</table>
      <p class="secthead"><a name="doc_chap13_sect3">Other Resources</a></p>
        <table class="ntable">
	  <tr>
	    <td bgcolor="#7a5ada" class="infohead"><b>
	      Name
	    </b></td>
	    <td bgcolor="#7a5ada" class="infohead"><b>
	      Link
	    </b></td>
	    <td bgcolor="#7a5ada" class="infohead"><b>
	      Description
	    </b></td>
	  </tr>
	  <tr>
	    <td bgcolor="#ddddff" class="tableinfo">
	      mp3report
	    </td>
	    <td bgcolor="#ddddff" class="tableinfo">
	      <a href="http://mp3report.sourceforge.net/">http://mp3report.sourceforge.net/</a>
	    </td>
	    <td bgcolor="#ddddff" class="tableinfo">
	      Suppose you have no iTunes XML file, mp3report could be used to generate one.  It runs over
	      your collection of mp3 files and does about the same as all these scripts.
	    </td>
	  </tr>
	  <tr>
	    <td bgcolor="#ddddff" class="tableinfo">
	      AudioHiJack
	    </td>
	    <td bgcolor="#ddddff" class="tableinfo">
	      <a href="http://www.rogueamoeba.com/audiohijack/">http://www.rogueamoeba.com/audiohijack/</a>
	    </td>
	    <td bgcolor="#ddddff" class="tableinfo">
	      Very good application to record online radio with.  Shareware at a nice
	      price.
	    </td>
	  </tr>
	  <tr>
	    <td bgcolor="#ddddff" class="tableinfo">
	      Doug's AppleScript for iTunes
	    </td>
	    <td bgcolor="#ddddff" class="tableinfo">
	      <a href="http://www.malcolmadams.com/itunes/index.php">http://www.malcolmadams.com/itunes/index.php</a>
	    </td>
	    <td bgcolor="#ddddff" class="tableinfo">
	      Ultimate resource for everything AppleScriptable in iTunes.
	    </td>
	  </tr>
	  <tr>
	    <td bgcolor="#ddddff" class="tableinfo">
	      ImageMagick
	    </td>
	    <td bgcolor="#ddddff" class="tableinfo">
	      <a href="http://www.imagemagick.org/">http://www.imagemagick.org/</a>
	    </td>
	    <td bgcolor="#ddddff" class="tableinfo">
	      Whatever you need to convert images if GraphicConverter does not seem
	      to do the trick.  Available in a weird license, which I think is as free
	      as possible for an image manipulation program that supports a wide range
	      of formats like this one.
	    </td>
	  </tr>
	  <tr>
	    <td bgcolor="#ddddff" class="tableinfo">
	      Clutter
	    </td>
	    <td bgcolor="#ddddff" class="tableinfo">
	      <a href="http://www.sprote.com/clutter/">http://www.sprote.com/clutter/</a>
	    </td>
	    <td bgcolor="#ddddff" class="tableinfo">
	      Nice application to get the Artwork in your iTunes.  It has not been updated
	      for a while however.
	    </td>
	  </tr>
	  <tr>
	    <td bgcolor="#ddddff" class="tableinfo">
	      iCatalog
	    </td>
	    <td bgcolor="#ddddff" class="tableinfo">
	      <a href="http://www.kavasoft.com/iTunesCatalog/">http://www.kavasoft.com/iTunesCatalog/</a>
	    </td>
	    <td bgcolor="#ddddff" class="tableinfo">
	      Shareware application that does the same as the scripts in this article.  Except,
	      without paying you only get albums from artists starting with letters A-E.  Easy
	      workaround: put an A-E in front of all your artists or so?  Naaah, just pay or
	      use the scripts here.
	    </td>
	  </tr>
	  <tr>
	    <td bgcolor="#ddddff" class="tableinfo">
	      iPlaylist
	    </td>
	    <td bgcolor="#ddddff" class="tableinfo">
	      <a href="http://iplaylist.knownworld.net/index.html">http://iplaylist.knownworld.net/index.html</a>
	    </td>
	    <td bgcolor="#ddddff" class="tableinfo">
	      Donationware application to publicize your library on a web page that looks like
	      you're in iTunes itself.  Does not extract images at all.
	    </td>
	  </tr>
	  <tr>
	    <td bgcolor="#ddddff" class="tableinfo">
	      itunes2html
	    </td>
	    <td bgcolor="#ddddff" class="tableinfo">
	      <a href="http://disobey.com/detergent/code/itunes2html.txt">http://disobey.com/detergent/code/itunes2html.txt</a>
	    </td>
	    <td bgcolor="#ddddff" class="tableinfo">
	      Somebody took the perl script approach for converting iTunes playlists to HTML.
	      iPlaylist is based on this.
	    </td>
	  </tr>
	</table>
      <p class="secthead"><a name="doc_chap13_sect4">Document Layout</a></p>
        <p>
	  This document was made with the excellent guide style sheet also
	  used to make the <a href="http://www.gentoo.org/">gentoo</a>
	  documentation, with some minor adaptations done by myself.
	</p>
	<p>
	  The XSLT file to generate all of this, is at <a href="http://dev.gentoo.org/~swift/local/guide.xsl">http://dev.gentoo.org/~swift/local/guide.xsl</a>.
	</p>
      <br><br><a href="http://creativecommons.org/licenses/by-nd-nc/1.0/"><img alt="Creative Commons License" border="0" src="http://creativecommons.org/images/public/somerights.gif"></a>
This work is licensed under a <a href="http://creativecommons.org/licenses/by-nd-nc/1.0/">Creative Commons License</a>.
<br>
</td>
<td width="1%" bgcolor="#d0d0d0" valign="top"><table border="0" cellspacing="5" cellpadding="0">
<tr><td valign="top" align="center" height="40"></td></tr>
<tr><td><img src="images/line.gif" alt="line"></td></tr>
<tr><td align="center" class="alttext">
                  Updated $LastChangedDate: 2005-01-07 20:53:38 +0100 (Fri, 07 Jan 2005) $</td></tr>
<tr><td><img src="images/line.gif" alt="line"></td></tr>
<tr><td class="alttext">
    <b><a class="altlink" href="mailto:CCTunes@coin-c.com">Kristof Van Landschoot</a></b>
  <br><i>Author</i><br><br>
</td></tr>
<tr><td><img src="images/line.gif" alt="line"></td></tr>
<tr><td class="alttext">
<b>Summary:</b>
    This is a short description of the things I did to get my library published from the XML file
    that iTunes keeps to a simple HTML file, album based.
  </td></tr>
<tr><td><img src="images/line.gif" alt="line"></td></tr>
<tr><td><a href="CCTunes.php">Multi-page Version (feedback enabled!)</a></td></tr>
</table></td>
</tr></table></td></tr>
<tr><td colspan="2" align="right" class="infohead" width="100%" bgcolor="#404040">
      Copyright 2003-2004 Coin-C bvba.  Questions, Comments, Corrections?  Email <a class="highlight" href="mailto:cctunes@coin-c.com">cctunes@coin-c.com</a>.
    </td></tr>
</table></body>
</html>