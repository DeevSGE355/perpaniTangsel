<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="AdminDashboard.css"> <!-- Link to your CSS file -->
</head><link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet"> <!-- Quill CSS -->
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script> <!-- Quill JS -->
<body>
    <?php
    // Start the session and include your database connection file
session_start();
// Include your database connection file here
$host = "localhost"; // Database host
$user = "root"; // Database username
$password = ""; // Database password
$dbname = "perpani"; // Database name

// Create connection
$conn = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="AdminDashboard.css">
</head>
<body>

    <div class="dashboard">
        <header>
            <h1>Admin Dashboard</h1>
            <nav>
                    <a href="#news-cms">News Editor</a>
                    <a href="#event-cms">Event Editor</a>
                    <a href="#social-media">Social Media</a>
                    <a href="#media-storage">Gallery Management</a>
                    <a href="#org-structure">Organization Structure</a>
            </nav>
        </header>
        <main>
            <section id="news-cms">
                <h2>News Management</h2>
                <Table class="news-list">
                    <tr>
                        <th>
                            <td>Title</td>
                            <td>Date</td>
                            <td>Option</td>
                        </th>
                    </tr>
                    <tbody>
                        <?php
                        $sql_news = "SELECT * FROM berita";
                        $result_news=$conn->query ($sql_news);

                        if (!$result_news) {
                            die("Error fetching events: " . $conn->error); // Handle error
                        }
                        

                        if ($result_news->num_rows > 0) {
                            // Output data of each row for news
                            while ($row = $result_news->fetch_assoc()) {
                                $newsId = htmlspecialchars($row['id']);
                                echo "<tr>
                                        <td><a href='berita.php?id=$newsId'>" . htmlspecialchars($row['judul']) . "</a></td>
                                        <td>" . date('d F Y', strtotime($row['tgl_post'])) . "</td>
                                        <td>
                                            <button onclick=\"editNews('$newsId')\">Edit</button>
                                            <button onclick=\"deleteNews('$newsId')\">Delete</button>
                                        </td>
                                      </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='3'>No news available</td></tr>";
                        }
                        ?>
                    </tbody>
                </Table>

                <script>
                    function editNews(id) {
                        // Redirect to the edit page or handle edit logic here
                        window.location.href = 'edit_news.php?id=' + id;
                    }
            
                    function deleteNews(id) {
                        // Handle delete logic here, e.g., make an AJAX call or redirect
                        if (confirm('Are you sure you want to delete this news?')) {
                            window.location.href = 'delete_news.php?id=' + id; // Redirect to delete script
                        }
                    }
                </script>

                <form action="insert_news.php" method="POST"action="insert_news.php" method="POST">
                    <h2>Buat Berita Baru</h2>

                    <label for="news-title">Judul:</label>
                    <input type="text" id="news-title" name="news-title" required>
                    
                    <label for="news-image">Gambar:</label>
                    <input type="file" id="news-image" name="news-image">

                    <label for="news-content">Isi:</label>
                    <textarea id="news-content" name="news-content" required></textarea>
                    
                    <button type="submit">Add News</button>
                </form>
            </section>

            <!-- Event CMS Section -->
            <section id="event-cms">
                <h2>Event Management</h2>
                <Table class="news-list">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql_events = "SELECT * FROM event"; // Adjust the query based on your table structure
                        $result_events = $conn->query($sql_events); // Fetch events
                        
                        // Check if the event query was successful
                        if (!$result_events) {
                            die("Error fetching events: " . $conn->error); // Handle error
                        }
                        
                        if ($result_events->num_rows > 0) {
                            // Output data of each row for events
                            while ($row = $result_events->fetch_assoc()) {
                                $eventId = htmlspecialchars($row['id']);
                                echo "<tr>
                                        <td><a href='event.php?id=$eventId'>" . htmlspecialchars($row['judul']) . "</a></td>
                                        <td>" . date('d F Y', strtotime($row['tgl_event'])) . "</td>
                                        <td>
                                            <button onclick=\"editEvent('$eventId')\">Edit</button>
                                            <button onclick=\"deleteEvent('$eventId')\">Delete</button>
                                        </td>
                                      </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='3'>No events available</td></tr>";
                        }
                        ?>
                    </tbody>
                </Table>
                <h2>Add Event</h2>
                <form action="" method="post" enctype="multipart/form-data">
                <label for="title">Event Title:</label>
                <input type="text" name="title" required><br>
                <label for="date">Event Date:</label>
                <input type="date" name="date" required><br>
                <label for="description">Description:</label>
                <textarea name="description" required></textarea><br>
                <label for="file">Upload Image:</label>
                <input type="file" name="file" accept="image/*" required><br>
                <input type="submit" value="Submit">
    </form>
            </section>

            <!-- Social Media Links Section -->
            <section id="social-media">
                <h2>Social Media Links</h2>
                <form>
                    <label for="facebook-link">Facebook:</label>
                    <input type="url" id="facebook-link" name="facebook-link">
                    
                    <label for="twitter-link">Twitter:</label>
                    <input type="url" id="twitter-link" name="twitter-link">
                    
                    <label for="instagram-link">Instagram:</label>
                    <input type="url" id="instagram-link" name="instagram-link">
                    
                    <button type="submit">Update Links</button>
                </form>
            </section>

            <!-- Media Storage Section -->
            <section id="media-storage">
                <h2>Media Storage</h2>
                <form>
                    <label for="media-upload">Upload Image/Video:</label>
                    <input type="f```php
<?php
// Start the session and include your database connection file
session_start();
// Include your database connection file here
$host = "localhost"; // Database host
$user = "root"; // Database username
$password = ""; // Database password
$dbname = "perpani"; // Database name

// Create connection
$conn = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch news from the database
$sql = "SELECT * FROM news"; // Adjust the query based on your table structure
$result = $conn->query($sql);

// Fetch events from the database
$sql_events = "SELECT * FROM events"; // Adjust the query based on your table structure
$result_events = $conn->query($sql_events);

// Fetch news from the database
$sql_news = "SELECT * FROM news"; // Adjust the query based on your table structure
$result_news = $conn->query($sql_news);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="AdminDashboard.css">
</head>
<body>
    <h2>News Management</h2>
    <table>
        <thead>
            <tr>
                <th>News Title</th>
                <th>News Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . htmlspecialchars($row['title']) . "</td>
                            <td>" . htmlspecialchars($row['date']) . "</td>
                            <td>
                                <button onclick=\"editNews('" . htmlspecialchars($row['id']) . "')\">Edit</button>
                                <button onclick=\"deleteNews('" . htmlspecialchars($row['id']) . "')\">Delete</button>
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='3'>No news available</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <script>
        function editNews(id) {
            // Redirect to the edit page or handle edit logic here
            window.location.href = 'edit_news.php?id=' + id;
        }

        function deleteNews(id) {
            // Handle delete logic here, e.g., make an AJAX call or redirect
            if (confirm('Are you sure you want to delete this news?')) {
                window.location.href = 'delete_news.php?id=' + id; // Redirect to delete script
            }
        }
    </script>
</body>
</html>

<div class="dashboard">
    <header>
        <h1>Admin Dashboard</h1>
        <nav>
                <a href="#news-cms">News Editor</a>
                <a href="#event-cms">Event Editor</a>
                <a href="#social-media">Social Media</a>
                <a href="#media-storage">Gallery Management</a>
                <a href="#org-structure">Organization Structure</a>
        </nav>
    </header>
    <main>
        <section id="news-cms">
            <h2>News Management</h2>
            <Table class="news-list">
                <tr>
                    <th>
                        <td>Title</td>
                        <td>Date</td>
                        <td>Option</td>
                    </th>
                </tr>
                <tbody>
                    <?php
                    if ($result_news->num_rows > 0) {
                        // Output data of each row for news
                        while ($row = $result_news->fetch_assoc()) {
                            $newsId = htmlspecialchars($row['id']);
                            echo "<tr>
                                    <td><a href='berita.php?id=$newsId'>" . htmlspecialchars($row['judul']) . "</a></td>
                                    <td>" . date('d F Y', strtotime($row['tgl_post'])) . "</td>
                                    <td>
                                        <button onclick=\"editNews('$newsId')\">Edit</button>
                                        <button onclick=\"deleteNews('$newsId')\">Delete</button>
                                    </td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='3'>No news available</td></tr>";
                    }
                    ?>
                </tbody>
            </Table>

            <script>
                function editNews(id) {
                    // Redirect to the edit page or handle edit logic here
                    window.location.href = 'edit_news.php?id=' + id;
                }
        
                function deleteNews(id) {
                    // Handle delete logic here, e.g., make an AJAX call or redirect
                    if (confirm('Are you sure you want to delete this news?')) {
                        window.location.href = 'delete_news.php?id=' + id; // Redirect to delete script
                    }
                }
            </script>

            <form action="insert_news.php" method="POST"action="insert_news.php" method="POST">
                <h2>Buat Berita Baru</h2>

                <label for="news-title">Judul:</label>
                <input type="text" id="news-title" name="news-title" required>
                
                <label for="news-image">Gambar:</label>
                <input type="file" id="news-image" name="news-image" accept="image/*" required>

                <label for="news-content">Isi:</label>
                <textarea id="news-content" name="news-content" required></textarea>
                
                <button type="submit">Add News</button>
            </form>
        </section>

        <section id="event-cms">
            <h2>Event Management</h2>
            <Table class="news-list">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result_events->num_rows > 0) {
                        // Output data of each row for events
                        while ($row = $result_events->fetch_assoc()) {
                            $eventId = htmlspecialchars($row['id']);
                            echo "<tr>
                                    <td><a href='event.php?id=$eventId'>" . htmlspecialchars($row['judul']) . "</a></td>
                                    <td>" . date('d F Y', strtotime($row['tgl_event'])) . "</td>
                                    <td>
                                        <button onclick=\"editEvent('$eventId')\">Edit</button>
                                        <button onclick=\"deleteEvent('$eventId')\">Delete</button>
                                    </td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='3'>No events available</td></tr>";
                    }
                    ?>
                </tbody>
            </Table>
            <h2>Add Event</h2>
            <form action="insert_event.php" method="POST">
                <label for="event-title">Judul Event:</label>
                <input type="text" id="event-title" name="event-title" required>

                <label for="event-image">Gambar:</label>
                <input type="image" id="event-image" name="event-image">
                
                <label for="event-date">Tanggal Event</label>
                <input type="datetime-local" id="event-date" name="event-date" required>
                
                <label for="event-description">Description:</label>
                <textarea id="event-desc" name="event-description" required></textarea>
                
                <button type="submit">Add Event</button>
            </form>
        </section>

        <!-- Social Media Links Section -->
        <section id="social-media">
            <h2>Social Media Links</h2>
            <form>
                <label for="facebook-link">Facebook:</label>
                <input type="url" id="facebook-link" name="facebook-link">
                
                <label for="twitter-link">Twitter:</label>
                <input type="url" id="twitter-link" name="twitter-link">
                
                <label for="instagram-link">Instagram:</label>
                <input type="url" id="instagram-link" name="instagram-link">
                
                <button type="submit">Update Links</button>
            </form>
        </section>

        <!-- Media Storage Section -->
        <section id="media-storage">
            <h2>Media Storage</h2>
            <form>
                <label for="media-upload">Upload Image/Video:</label>
                <input type="file" id="media-upload" name="media-upload" accept="image/*,video/*" required>
                
                <label for="media-title">File Name:</label>
                <input type="text" id="media-title" name="media-title" required>

                <button type="submit">Upload</button>
            </form>
        </section>

        <!-- Organization Structure Section -->
        <section id="org-structure">
            <h2>Organization Structure</h2>
            <form>
                <label for="edit-structure">Editable Organization Structure:</label>
                <div id="editor"></div>
                
                <button type="submit">Update Structure</button>
            </form>
        </section>
    </main>

    <section id="sponsor-cms">
        <h2>Add New Sponsor</h2>
        <form action="insert_sile" id="media-upload" name="media-upload" accept="image/*,video/*" required>
                    
                    <label for="media-title">File Name:</label>
                    <input type="text" id="media-title" name="media-title" required>

                    <button type="submit">Upload</button>
                </form>
            </section>

            <!-- Organization Structure Section -->
            <section id="org-structure">
                <h2>Organization Structure</h2>
                <form>
                    <label for="edit-structure">Editable Organization Structure:</label>
                    <div id="editor"></div>
                    
                    <button type="submit">Update Structure</button>
                </form>
            </section>
        </main>

        <section id="sponsor-cms">
            <h2>Add New Sponsor</h2>
            <form action="insert_sponsor.php" method="POST" enctype="multipart/form-data">
                <label for="sponsor-name">Sponsor Name:</label>
                <input type="text" id="sponsor-name" name="sponsor-name" required>
        
                <label for="sponsor-logo">Sponsor Logo:</label>
                <input type="file" id="sponsor-logo" name="sponsor-logo" accept="image/*" required>
        
                <button type="submit">Add Sponsor</button>
            </form>
        </section>

        <footer>
            <p>&copy; 2023 PERPANI Tangerang Selatan. All rights reserved.</p>
        </footer>
    </div>
    <script>
        // Initialize Quill editor
        var quill = new Quill('#editor', {
            theme: 'snow', // Specify theme in options
            modules: {
                toolbar: [
                [{ 'size': ['8', '10', '12', '14', '16', '18', '24', '36', false] }], // Numeric size dropdown
                    ['bold', 'italic', 'underline', 'strike'], // toggled buttons
                    ['link', 'image'], // link and image
                    [{ 'list': 'ordered' }, { 'list': 'bullet' }], // Lists
                    [{ 'align': [] }], // Text alignment
                    [{ 'header': [1, 2, 3, 4, 5, 6, false] }], // Header dropdown
                    [{ 'color': ['#0F4036', '#00796B',  '#2d6a4f', '#afd9ac', '#9EC3BC', '#ffffff', 'inherit'] }],
                    ['clean'] // remove formatting button
                ]
            }
        });
    </script>
    <?php $conn->close(); // Close the database connection ?>

</body>
</html>