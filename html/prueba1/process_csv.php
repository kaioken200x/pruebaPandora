<?php

// Function to decode a score encoded in a custom numeric system
function decodeScore($numericSystem, $encodedScore) {
    $base = strlen($numericSystem);  // The base of the numeric system
    $result = 0;

    // Iterate through each character of the encoded score
    $length = strlen($encodedScore);
    $power = $length - 1;  // The power starts at (n-1) where n is the string length

    for ($i = 0; $i < $length; $i++) {
        // Find the index of the character in the numeric system
        $digit = strpos($numericSystem, $encodedScore[$i]);
        
        if ($digit === false) {
            // If the character is not in the numeric system, return an error
            return "ERROR: Invalid character in encoded score.";
        }

        // Multiply by the base raised to the corresponding power
        $result += $digit * pow($base, $power);
        $power--; // Decrement the power
    }

    return $result;
}

// Check if a file was uploaded
if (isset($_FILES['csvFile']) && $_FILES['csvFile']['error'] == 0) {
    // Path to the uploaded file
    $csvFile = $_FILES['csvFile']['tmp_name'];

    // Open the CSV file
    if (($handle = fopen($csvFile, 'r')) !== FALSE) {
        // Variable to store the results
        $results = [];

        // Read each line of the CSV
        while (($data = fgetcsv($handle, 1000, ',')) !== FALSE) {
            // Extract data from each line
            $user = $data[0];
            $numericSystem = $data[1];
            $encodedScore = $data[2];

            // Decode the score
            $decodedScore = decodeScore($numericSystem, $encodedScore);

            // Add the result to the list
            $results[] = ['user' => $user, 'score' => $decodedScore];
        }

        // Close the file
        fclose($handle);

        // Sort the results by score in descending order
        usort($results, function($a, $b) {
            return $b['score'] <=> $a['score'];
        });

        // Return the results in the requested format
        foreach ($results as $result) {
            echo $result['user'] . ',' . $result['score'] . '<br>';
        }
    } else {
        echo "Unable to open the file.";
    }
} else {
    echo "Error uploading the file.";
}
?>
