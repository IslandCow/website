<?php
//
// PWG home page.
//

include_once "phplib/site.php";
include_once "phplib/db-article.php";

site_header("");

$matches = article_search();


?>

<div class="row pwg-panel">
  <div class="col-md-3 hidden-sm hidden-xs">
    <img class="pwg-panel-logo" src="<?print($html_path);?>dynamo/resources/pwg-medium@2x.png">
  </div>
  <div class="col-md-9 col-sm-12">
    <h1>The Printer Working Group</h1>
    <p>Our members include printer and multi-function device manufacturers, print server developers, operating system providers, print management application developers, and industry experts. We make printers, multi-function devices, and the applications and operating systems supporting them work together better.</p>
    <p class="hidden-xs">&nbsp;</p>
    <ul class="nav nav-pills">
      <li role="presentation"><a href="#ABOUT">More Info</a></li>
      <li role="presentation"><a href="<?print($html_path);?>3d/index.html">3D Printing</a></li>
      <li role="presentation"><a href="<?print($html_path);?>ipp/everywhere.html">IPP Everywhere<sup>&reg;</sup></a></li>
      <li role="presentation"><a href="<?print($html_path);?>sm/model.html">PWG Semantic Model</a></li>
    </ul>
  </div>
</div>
<div class="row pwg-panel pwg-alt-2">
  <div class="col-md-12 col-sm-12">
    <h1>Recent News</h1>
<?

//$styles = array(" pwg-alt-2", " pwg-alt-0", " pwg-alt-1", "");

for ($i = 0, $count = 0; $i < sizeof($matches) && $count < 5; $i ++)
{
  $article = new article($matches[$i]);

  if ($article->id != $matches[$i])
    continue;

  $count ++;

//  $style = $styles[$count % 4];
//  print("<div class=\"row pwg-panel$style\">\n"
//       ."  <div class=\"col-md-12 col-sm-12\">\n");
  $article->view("", 3, FALSE);
//  print("  </div>\n"
//       ."</div>\n");
}

print("    <ul class=\"nav nav-pills\"><li role=\"presentation\"><a href=\"${html_path}dynamo/articles.php\">View Older Articles</a></li></ul>\n");

//$style = $styles[$count % 4];
//print("<div class=\"row pwg-panel$style\">\n"
//     ."  <div class=\"col-md-12 col-sm-12\">\n");

?>
  </div>
</div>
<div class="row pwg-panel pwg-alt-0">
  <div class="col-md-12 col-sm-12">
    <h1><a name="ABOUT">About the Printer Working Group</a></h1>
    <p>The Printer Working Group (PWG) is a Program of the <a href="http://www.ieee-isto.org/">IEEE Industry Standard and Technology Organization (ISTO)</a> with members including printer and multi-function device manufacturers, print server developers, operating system providers, print management application developers, and industry experts. Originally founded in 1991 as the Network Printing Alliance, the PWG is chartered to make printers, multi-function devices, and the applications and operating systems supporting them work together better.</p>
    <p>The PWG enjoys an open standards development process. Everyone is welcome to contribute to the development of our documents and standards, serve as editors, and participate in interoperability tests. Members may additionally serve as officers in the various working groups. Voting Members approve the documents and standards for publication and may serve as officers of the PWG.</p>
    <p>If you have questions about the PWG, participation in PWG activities, or membership in the PWG, please contact the <a href="mailto:chair@pwg.org">PWG Chair</a> or any other officer.</p>
    <ul class="nav nav-pills">
      <li role="presentation"><a href="<?print($html_path);?>chair/index.html">Officers</a></li>
      <li role="presentation"><a href="<?print($html_path);?>pwg-logos/members.html">Members</a></li>
      <li role="presentation"><a href="#PARTICIPATING">Participating</a></li>
      <li role="presentation"><a href="#JOINING">Joining the PWG</a></li>
    </ul>
  </div>
</div>
<div class="row pwg-panel pwg-alt-1">
  <div class="col-md-12 col-sm-12">
    <h1>Active Workgroups</h1>
    <p>The PWG currently has two active workgroups:</p>

    <h2>Internet Printing Protocol (IPP)</h2>
    <p>The Internet Printing Protocol workgroup is developing standards for IPP-based multi-function services such as scanning and facsimile as well as 3D printing solutions using IPP.</p>
    <ul class="nav nav-pills">
      <li role="presentation"><a href="<?print($html_path);?>ipp/index.html">IPP Workgroup Page</a></li>
      <li role="presentation"><a href="<?print($html_path);?>ipp/everywhere.html">IPP Everywhere<sup>&reg;</sup></a></li>
      <li role="presentation"><a href="<?print($html_path);?>3d/index.html">3D Printing</a></li>
    </ul>

    <h2>Semantic Model (SM)</h2>
    <p>The Semantic Model workgroup is responsible for the modeling of the services - Print, Copy, Scan, FaxIn/Out, Resource, System Control, and Transform hosted on Multifunction Devices and, more generally, Imaging Systems. Standardization supports interoperability of systems, devices, and services in local, enterprise, and cloud deployments enabling improved job submission, job management, remote administration, and support. The goal of the workgroup is to define a unified Semantic Model and set of abstract operations for the most common and essential system, service, and device features.</p>
    <p>The Semantic Model workgroup is also engaged in several mapping activities to support AFP and JDF workflows and remote monitoring and management through DTMF CIM.</p>
    <ul class="nav nav-pills">
      <li role="presentation"><a href="<?print($html_path);?>sm/index.html">Semantic Model Workgroup Page</a></li>
      <li role="presentation"><a href="<?print($html_path);?>sm/model.html">Semantic Model Overview</a></li>
    </ul>
  </div>
</div>
<div class="row pwg-panel">
  <div class="col-md-12 col-sm-12">
    <h1><a name="PARTICIPATING">Participating</a></h1>
    <p>The Printer Working Group maintains an open standards development environment and welcomes the participation of all who are interested in printing and imaging technologies, standards, and solutions. All that is required to participate is to be polite and agree to abide by the terms of the <a href="<?print($html_path);?>chair/membership_docs/pwg-ip-policy.pdf">PWG Policy on Intellectual Property and Confidentiality</a>, which roughly amounts to "anything you share in a PWG meeting, on the PWG FTP server, or on the PWG mailing lists can be included in a PWG standard or informational document."</p>
    <p>You can participate in person or virtually via phone and/or email. See the <a href="<?print($html_path);?>mailman/listinfo">workgroup mailing lists</a> to ask questions, contribute, or learn when the next meeting is scheduled for a particular workgroup.</p>
  </div>
</div>
<div class="row pwg-panel pwg-alt-2">
  <div class="col-md-12 col-sm-12">
    <h1><a name="JOINING">Joining the PWG</a></h1>
    <p>If your company is interested in becoming a member of the PWG, you should review the following procedure documents and complete and mail in the <a href="<?print($html_path);?>pwg-logos/members.html#FORMS">PWG Membership Form</a>. If you have any questions about membership, don't hesitate to contact the <a href="mailto:chair@pwg.org">PWG Chair</a> or any of the other <a href="<?print($html_path);?>chair/index.html">officers</a> of the PWG.</p>
    <p>Dues are payable to "The IEEE Standard and Technology Organization" via check or credit card.</p>
    <table class="table table-condensed pwg-table pwg-table-alt-2" summary="Membership Privileges">
      <caption>PWG Membership Privileges</caption>
      <thead>
	<tr>
	  <th>Level</th>
	  <th>Annual Dues</th>
	  <th class="PWGNoMobile">Meetings and&nbsp;Lists</th>
	  <th class="PWGNoMobile">Document Editor</th>
	  <th class="PWGNoMobile">Workgroup Officer</th>
	  <th class="PWGNoMobile">PWG Officer</th>
	  <th class="PWGNoMobile">Voting</th>
	</tr>
      </thead>
      <tbody>
	<tr>
	  <td align="center">Non-Member</td>
	  <td align="center">FREE</td>
	  <td align="center" class="PWGNoMobile">&#10003;</td>
	  <td align="center" class="PWGNoMobile">&#10003;</td>
	  <td align="center" class="PWGNoMobile">&nbsp;</td>
	  <td align="center" class="PWGNoMobile">&nbsp;</td>
	  <td align="center" class="PWGNoMobile">&nbsp;</td>
	</tr>
	<tr>
	  <td align="center">Non-Voting</td>
	  <td align="center">$50</td>
	  <td align="center" class="PWGNoMobile">&#10003;</td>
	  <td align="center" class="PWGNoMobile">&#10003;</td>
	  <td align="center" class="PWGNoMobile">&#10003;</td>
	  <td align="center" class="PWGNoMobile">&nbsp;</td>
	  <td align="center" class="PWGNoMobile">&nbsp;</td>
	</tr>
	<tr>
	  <td align="center">Individual</td>
	  <td align="center">$250</td>
	  <td align="center" class="PWGNoMobile">&#10003;</td>
	  <td align="center" class="PWGNoMobile">&#10003;</td>
	  <td align="center" class="PWGNoMobile">&#10003;</td>
	  <td align="center" class="PWGNoMobile">&#10003;</td>
	  <td align="center" class="PWGNoMobile">&#10003;</td>
	</tr>
	<tr>
	  <td align="center">Small Corp.<br>(&lt;$10M)</td>
	  <td align="center">$250</td>
	  <td align="center" class="PWGNoMobile">&#10003;</td>
	  <td align="center" class="PWGNoMobile">&#10003;</td>
	  <td align="center" class="PWGNoMobile">&#10003;</td>
	  <td align="center" class="PWGNoMobile">&#10003;</td>
	  <td align="center" class="PWGNoMobile">&#10003;</td>
	</tr>
	<tr>
	  <td align="center">Large Corp.<br>(&ge;$10M)</td>
	  <td align="center">$1,500</td>
	  <td align="center" class="PWGNoMobile">&#10003;</td>
	  <td align="center" class="PWGNoMobile">&#10003;</td>
	  <td align="center" class="PWGNoMobile">&#10003;</td>
	  <td align="center" class="PWGNoMobile">&#10003;</td>
	  <td align="center" class="PWGNoMobile">&#10003;</td>
	</tr>
      </tbody>
    </table>
  </div>
</div>

<?

site_footer();

?>
