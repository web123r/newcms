<?php
$conn = new mysqli('localhost', 'root', '', 'updatedcms');
$queries = [
    "ALTER TABLE info ADD COLUMN FACEBOOK varchar(200) DEFAULT ''",
    "ALTER TABLE info ADD COLUMN TWITTER varchar(200) DEFAULT ''",
    "ALTER TABLE info ADD COLUMN INSTAGRAM varchar(200) DEFAULT ''",
    "ALTER TABLE info ADD COLUMN LINKEDIN varchar(200) DEFAULT ''",
    "ALTER TABLE info ADD COLUMN PROJ_WORK int(11) DEFAULT 0",
    "ALTER TABLE info ADD COLUMN PROJ_DONE int(11) DEFAULT 0",
    "ALTER TABLE info ADD COLUMN AWARDS int(11) DEFAULT 0",
    "ALTER TABLE info ADD COLUMN CLIENTS int(11) DEFAULT 0"
];

foreach ($queries as $query) {
    if ($conn->query($query)) {
        echo "Success: $query\n";
    } else {
        echo "Error: " . $conn->error . "\n";
    }
}
?>
