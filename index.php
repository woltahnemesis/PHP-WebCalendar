<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <title>Calendar</title>
  </head>
  <body>
    <?php

    $days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
    $months = [
      "January" => 31,
      "February" => 28,
      "March" => 31,
      "April" => 30,
      "May" => 31,
      "June" => 30,
      "July" => 31,
      "August" => 31,
      "September" => 30,
      "October" => 31,
      "November" => 30,
      "December" => 31
    ];
    $currentYear = 2021;
    $startingDay = $days[5];
    $startingMonth = "January";
    $numDayInMonth = 1;
    $leapYear;
    $addExtraDay = 0;
    $currentColor = "transparent";
    $currentDate = getdate();
    $currentMDay = intval($currentDate['mday']);
    $currentGetYear = intval($currentDate['year']);

    // Turn keys into values
    $monthArray = array_keys($months);

    if(isset($_GET['year'])) {
      $currentYear = $_GET['year'];
    }
    ?>

    <h1 style="text-align: center; margin: 1em 0 0 0;">Year <?php echo $currentYear; ?></h1>
    <form action="index.php" method="get">
      <select name='year' onchange="selectYear()" class="form-select form-select-sm w-25 mx-auto mt-3 mb-3" aria-label=".form-select-sm example">
        <option selected value='2021'>Select Year</option>
        <?php
        for($j = 0; $j <= 78; $j++) {

        ?>
        <option value="<?php echo $j + 2021; ?>"><?php echo $j + 2021; ?></option>
        <?php

        }

        ?>
      </select>
      <input type="submit" name="submit" style="display: none;" value="Submit">
    </form>
    <p style="text-align: center;">Calendar Made By: Rey Walter Magbanua</p>
    <hr>
    <br>


    <?php

    $leapYear = $currentYear % 4;

    // Check if current year is a leap year
    if($leapYear == 0) {
      $months['February'] = 29;
    } else {
      $months['February'] = 28;
    }

    if($currentYear != 2021) {

      $addExtraDay = strval(($currentYear - 2021) / 4);
      $addExtraDay = explode(".", $addExtraDay);
      $addExtraDay = intval($addExtraDay[0]);

      $addedYear = $currentYear - 2021 + 5 + $addExtraDay;

      if($addedYear > 6) {
        $addedYear = $addedYear % 7;
      }

      $startingDay = $days[$addedYear];
    }

    foreach($monthArray as $month) {

      $startingMonth = $month;
    ?>
    <table class="table" style="width: 50%; margin: 3em auto;">
      <h1 style="text-align: center;"><?php echo $month; ?></h1>
      <thead class="thead-light">
        <tr>
          <th>Sunday</th>
          <th>Monday</th>
          <th>Tuesday</th>
          <th>Wednesday</th>
          <th>Thursday</th>
          <th>Friday</th>
          <th>Saturday</th>
        </tr>
      </thead>
      <tbody>
        <?php

        if($month === $startingMonth) {
          for($i = 0; $i < 6; $i++) {


        ?>
        <tr style="height: 2.3em; text-align: center; ">
          <td style="background-color: <?php echo $currentColor; ?>">
            <?php

            if($startingDay === "Sunday" && $numDayInMonth <= $months[$month]) {

              echo $numDayInMonth;
              $numDayInMonth++;
              $startingDay = "Monday";

              if($startingDay === $currentDate['weekday']) {
                if($startingMonth === $currentDate['month']) {
                  if($numDayInMonth === $currentMDay) {
                    if($currentYear == $currentGetYear) {
                      $currentColor = '#dddddd';
                    }
                  }
                }
              } else {
                $currentColor = 'transparent';
              }

            }

            ?>
          </td>

          <td style="background-color: <?php echo $currentColor; ?>">
            <?php

            if($startingDay === "Monday" && $numDayInMonth <= $months[$month]) {

              echo $numDayInMonth;
              $numDayInMonth++;
              $startingDay = "Tuesday";

              if($startingDay === $currentDate['weekday']) {
                if($startingMonth === $currentDate['month']) {
                  if($numDayInMonth === $currentMDay) {
                    if($currentYear == $currentGetYear) {
                      $currentColor = '#dddddd';
                    }
                  }
                }
              } else {
                $currentColor = 'transparent';
              }

            }

            ?>
          </td>

          <td style="background-color: <?php echo $currentColor; ?>">
            <?php

            if($startingDay === "Tuesday" && $numDayInMonth <= $months[$month]) {

              echo $numDayInMonth;
              $numDayInMonth++;
              $startingDay = "Wednesday";

              if($startingDay === $currentDate['weekday']) {
                if($startingMonth === $currentDate['month']) {
                  if($numDayInMonth === $currentMDay) {
                    if($currentYear == $currentGetYear) {
                      $currentColor = '#dddddd';
                    }
                  }
                }
              } else {
                $currentColor = 'transparent';
              }

            }

            ?>
          </td>

          <td style="background-color: <?php echo $currentColor; ?>">
            <?php

            if($startingDay === "Wednesday" && $numDayInMonth <= $months[$month]) {
              echo $numDayInMonth;
              $numDayInMonth++;
              $startingDay = "Thursday";
            }

            if($startingDay === $currentDate['weekday']) {
              if($startingMonth === $currentDate['month']) {
                if($numDayInMonth === $currentMDay) {
                  if($currentYear == $currentGetYear) {
                    $currentColor = '#dddddd';
                  }
                }
              }
            } else {
              $currentColor = 'transparent';
            }

            ?>
          </td>

          <td style="background-color: <?php echo $currentColor; ?>">
            <?php

            if($startingDay === "Thursday" && $numDayInMonth <= $months[$month]) {
              echo $numDayInMonth;
              $numDayInMonth++;
              $startingDay = "Friday";
            }

            if($startingDay === $currentDate['weekday']) {
              if($startingMonth === $currentDate['month']) {
                if($numDayInMonth === $currentMDay) {
                  if($currentYear == $currentGetYear) {
                    $currentColor = '#dddddd';
                  }
                }
              }
            } else {
              $currentColor = 'transparent';
            }

            ?>
          </td>

          <td style="background-color: <?php echo $currentColor; ?>">
            <?php

            if($startingDay === "Friday" && $numDayInMonth <= $months[$month]) {
              echo $numDayInMonth;
              $numDayInMonth++;
              $startingDay = "Saturday";
            }

            if($startingDay === $currentDate['weekday']) {
              if($startingMonth === $currentDate['month']) {
                if($numDayInMonth === $currentMDay) {
                  if($currentYear == $currentGetYear) {
                    $currentColor = '#dddddd';
                  }
                }
              }
            } else {
              $currentColor = 'transparent';
            }

            ?>
          </td>

          <td style="background-color: <?php echo $currentColor; ?>">
            <?php

            if($startingDay === "Saturday" && $numDayInMonth <= $months[$month]) {
              echo $numDayInMonth;
              $numDayInMonth++;
              $startingDay = "Sunday";
            }

            if($startingDay === $currentDate['weekday']) {
              if($startingMonth === $currentDate['month']) {
                if($numDayInMonth === $currentMDay) {
                  if($currentYear == $currentGetYear) {
                    $currentColor = '#dddddd';
                  }
                }
              }
            } else {
              $currentColor = 'transparent';
            }

            ?>
          </td>

        </tr>
        <?php

            }
          }

          $numDayInMonth = 1;

        ?>
      </tbody>
    </table>
    <?php } ?>

    <script>
      function selectYear(){

        document.querySelector('input').click();

      }
    </script>
  </body>
</html>
