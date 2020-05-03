<?php

$hierarchy = array(
  array(
    'title_name' => 'CEO',
    'subordinate' => array(
      // Start: Commercial Director
      array(
        'title_name' => 'Commercial Director',
        'subordinate' => array(
          // Start: Sales Manager
          array(
            'title_name' => 'Sales Manager',
          )
          // Final: Seles Manager
        )
      ),
      // Final: Commercial Director
      // Start: chief financial officer
      array(
        'title_name' => 'Chief Financial Officer',
        'subordinate' => array(
          // Start: Accounts Payable Manager
          array(
            'title_name' => 'Accounts Payable Manager',
            'subordinate' => array(
              // Start: payments supervisor
              array(
                'title_name' => 'Payments Supervisor',
              )
              // Final: payments supervisor
            )
          ),
          // Final: Accounts Payable Manager
          // Start: Purchasing manager
          array(
            'title_name' => 'Purchasing manager',
            'subordinate' => array(
              // Start: Supervisor
              array(
                'title_name' => 'Supervisor',
                // Final: Supervisor
              )
            )
          )
          // Final: Purchasing manager
        )
      )
      // Final: chief financial officer
    )
  )
);

function Show_the_members($titles)
{
  $html = '<ul>';

  foreach ($titles as $title) {
    $html .= '<li>';
    $html .= $title['title_name'];

    if (isset($title['subordinate']) && count($title['subordinate']) > 0) {
      $html .= Show_the_members($title["subordinate"]);
    }

    $html .= '</li>';
  }

  $html .= '</ul>';

  return $html;
}


echo Show_the_members($hierarchy);

/***
 *  Example to be able to use the Recursive Function, 
 * this data will probably come from a database or other 
 * data source.
 */
