<?php
// get_team_data.php - API endpoint to fetch team data
header('Content-Type: application/json');

// Get year filter if provided
$year = isset($_GET['year']) ? $_GET['year'] : 'all';
$team = isset($_GET['team']) ? $_GET['team'] : 'all';

// Leaders - GDG Lead and Faculty Coordinator
$leadersQuery = "SELECT id, name, position, image_url, instagram, github, linkedin, year 
                FROM team_members 
                WHERE position IN ('GDG Lead', 'Faculty Coordinator')";

if ($year != 'all') {
    $leadersQuery .= " AND year = '$year'";
}

$leadersResult = $conn->query($leadersQuery);
$leaders = [];

if ($leadersResult->num_rows > 0) {
    while($row = $leadersResult->fetch_assoc()) {
        $leaders[] = $row;
    }
}

// Executive Team
$executiveQuery = "SELECT id, name, position, image_url, instagram, github, linkedin, year 
                  FROM team_members 
                  WHERE team = 'executive'";

if ($year != 'all') {
    $executiveQuery .= " AND year = '$year'";
}

$executiveResult = $conn->query($executiveQuery);
$executive = [];

if ($executiveResult->num_rows > 0) {
    while($row = $executiveResult->fetch_assoc()) {
        $executive[] = $row;
    }
}

// Function to get team members by team type
function getTeamMembers($conn, $teamType, $year) {
    $query = "SELECT id, name, position, image_url, instagram, github, linkedin, year 
             FROM team_members 
             WHERE team = '$teamType'";
    
    if ($year != 'all') {
        $query .= " AND year = '$year'";
    }
    
    $result = $conn->query($query);
    $members = [];
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $members[] = $row;
        }
    }
    
    return $members;
}

// Get all team data based on filters
$teamData = [
    'leaders' => $leaders,
    'executive' => $executive,
    'web' => getTeamMembers($conn, 'web', $year),
    'design' => getTeamMembers($conn, 'design', $year),
    'operations' => getTeamMembers($conn, 'operations', $year),
    'marketing' => getTeamMembers($conn, 'marketing', $year),
    'technical' => getTeamMembers($conn, 'technical', $year),
    'outreach' => getTeamMembers($conn, 'outreach', $year),
    'media' => getTeamMembers($conn, 'media', $year)
];

// Return filtered team data
if ($team != 'all') {
    if (isset($teamData[$team])) {
        echo json_encode(['success' => true, 'data' => $teamData[$team]]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Team not found']);
    }
} else {
    echo json_encode(['success' => true, 'data' => $teamData]);
}

$conn->close();

?>