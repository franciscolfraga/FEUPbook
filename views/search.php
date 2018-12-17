<?php
  include ('config/init.php');
  include ('database/search-bar.php');
  include ('database/member.php');

  $continue = true;
  ?>
  <?php
  // Check for "special" input - possibly an email specifying a member

  if (strpos($_GET['field'], '@') !== false AND ($rows = getMemberByEmail($_GET['field']))) {

    // display member info right away?>
    <div class="section">
    <h2 class="title"> Member </h2>
    <?php
    foreach($rows as $row) { ?>
      <div class="entry card">
        <a href="../profile.php?profileid=<?= $row['id'] ?>" onclick="post">
          <table>
            <tr class="details">
              <?php $prof = getMemberFromPost($row['id']) ?>
              <td class="member_pic"><img src="<?= $prof['profilepic'] ?>"></td>
              <td class="member_name"><p><?= $row['name'] ?><p></td>
            </tr>
          </table>
          </a>
      </div>
      <p></p>
    <?php  } ?>
    </div>

    <?php
    // LIST DEPARTMENTS

    $rows = getDepartmentByEmail($_GET['field']);

    if ($rows) { ?>
      <div class="section">
      <h2 class="title"> Department </h2>
      <?php
      foreach($rows as $row) { ?>
        <div class="entry card">
          <a href="../groupview.php?groupid=<?= $row['circleid'] ?>" onclick="post">
            <table>
              <tr class="details">
                <td class="initials"><p><?= $row['initials'] ?></p></td>
                <td class="member_name"><p><?= $row['name'] ?></p></td>
              </tr>
            </table>
            </a>
        </div>
        <p></p>
      <?php  } ?>
      </div>
    <?php  }
     ?>

     <?php
     // LIST PROGRAMS
     $rows = getProgramByEmail($_GET['field']);

     if ($rows) { ?>
     <div class="section">
       <h2 class="title"> Program </h2>
       <?php
       foreach($rows as $row) { ?>
         <div class="entry card">
           <a href="../groupview.php?groupid=<?= $row['circleid'] ?>" onclick="post">
             <table>
               <tr class="details">
                 <td class="initials"><p><?= $row['initials'] ?></p></td>
                 <td class="member_name"><p><?= $row['name'] ?></p></td>
               </tr>
             </table>
             </a>
         </div>
         <p></p>
      <?php  } ?>
      </div>
    <?php  }
     ?>

     <?php
     // LIST COURSES

     $rows = getCoursesByEmail($_GET['field']);

     if ($rows) { ?>
     <div class="section">
       <h2 class="title"> Courses </h2>
       <?php
       foreach($rows as $row) { ?>
         <div class="entry card">
           <a href="../groupview.php?groupid=<?= $row['circleid'] ?>" onclick="post">
             <table>
               <tr class="details">
                 <td class="initials"><p><?= $row['initials'] ?></p></td>
                 <td class="member_name"><p><?= $row['name'] ?></p></td>
                 <td class="year"><p><?= $row['year'] ?></p></td>
               </tr>
             </table>
             </a>
         </div>
         <p></p>
      <?php  } ?>
      </div>
    <?php  }
     ?>

     <?php
     // LIST CLASSES

     $rows = getClassesByEmail($_GET['field']);

     if ($rows) { ?>
     <div class="section">
       <h2 class="title"> Classes </h2>
       <?php
       foreach($rows as $row) { ?>
         <div class="entry card">
           <a href="../groupview.php?groupid=<?= $row['circleid'] ?>" onclick="post">
             <table>
               <tr class="details">
                 <td style="text-align:center;"><p><?= $row['reference'] ?></p></td>
               </tr>
             </table>
             </a>
         </div>
         <p></p>
      <?php  } ?>
      </div>
    <?php  }
     ?>

    <?php $continue = false; ?>

   <?php } ?>

  <?php
  // if no "special" entry was detected proceed with general queries

  if ($continue) {

    // Analyze input

    $pieces = explode(' ', $_GET['field'], 3); // max 3 pieces

    if (sizeof($pieces) > 2) {
      $logical = strtoupper($pieces[1]);

      if ($logical === 'AND' OR $logical === 'OR' OR $logical === 'NOT') {
        $search = array($logical, $pieces[0], $pieces[2]);
      } else {
        $search = $_GET['field'];
      }
    } else {
      $search = $_GET['field'];
    } ?>

    <h1 class="search_title"> Searching results for: "<?= $_GET['field']; ?>"</h1>

    <?php
    // LIST MEMBERS

    $rows = getMembersByPartialName($search);

    if ($rows) {
      ?>
      <div class="section">
      <h2 class="title"> Members </h2>
      <?php
      foreach($rows as $row) { ?>
        <div class="entry card">
          <a href="../profile.php?profileid=<?= $row['id'] ?>" onclick="post">
            <table>
              <tr class="details">
                <?php $prof = getMemberFromPost($row['id']) ?>
                <td class="member_pic"><img src="<?= $prof['profilepic'] ?>"></td>
                <td class="member_name"><p><?= $row['name'] ?><p></td>
              </tr>
            </table>
            </a>
        </div>
        <p></p>
      <?php  } ?>
      </div>
    <?php  }
     ?>

    <?php
    // LIST DEPARTMENTS

    $rows = getDepartmentsByPartialNameOrInitials($search);

    if ($rows) { ?>
      <div class="section">
      <h2 class="title"> Departments </h2>
      <?php
      foreach($rows as $row) { ?>
        <div class="entry card">
          <a href="../groupview.php?groupid=<?= $row['circleid'] ?>" onclick="post">
            <table>
              <tr class="details">
                <td class="initials"><p><?= $row['initials'] ?></p></td>
                <td class="member_name"><p><?= $row['name'] ?></p></td>
              </tr>
            </table>
            </a>
        </div>
        <p></p>
      <?php  } ?>
      </div>
    <?php  }
     ?>

    <?php
    // LIST PROGRAMS
    $rows = getProgramsByPartialNameOrInitials($search);

    if ($rows) { ?>
    <div class="section">
      <h2 class="title"> Programs </h2>
      <?php
      foreach($rows as $row) { ?>
        <div class="entry card">
          <a href="../groupview.php?groupid=<?= $row['circleid'] ?>" onclick="post">
            <table>
              <tr class="details">
                <td class="initials"><p><?= $row['initials'] ?></p></td>
                <td class="member_name"><p><?= $row['name'] ?></p></td>
              </tr>
            </table>
            </a>
        </div>
        <p></p>
     <?php  } ?>
     </div>
   <?php  }
    ?>

    <?php
    // LIST COURSES

    $rows = getCoursesByPartialNameOrInitials($search);


    if ($rows) { ?>
    <div class="section">
      <h2 class="title"> Courses </h2>
      <?php
      foreach($rows as $row) { ?>
        <div class="entry card">
          <a href="../groupview.php?groupid=<?= $row['circleid'] ?>" onclick="post">
            <table>
              <tr class="details">
                <td class="initials"><p><?= $row['initials'] ?></p></td>
                <td class="member_name"><p><?= $row['name'] ?></p></td>
                <td class="year"><p><?= $row['year'] ?></p></td>
              </tr>
            </table>
            </a>
        </div>
        <p></p>
     <?php  } ?>
     </div>
   <?php  }
    ?>

    <?php
    // LIST CLASSES

    $rows = getClassesByPartialReference($search);

    if ($rows) { ?>
    <div class="section">
      <h2 class="title"> Classes </h2>
      <?php
      foreach($rows as $row) { ?>
        <div class="entry card">
          <a href="../groupview.php?groupid=<?= $row['circleid'] ?>" onclick="post">
            <table>
              <tr class="details">
                <td style="text-align:center;"><p><?= $row['reference'] ?></p></td>
              </tr>
            </table>
            </a>
        </div>
        <p></p>
     <?php  } ?>
     </div>
   <?php  }
    ?>
<?php } ?>
