<?php
class SEOPlugin {
    public function getMetaTags() {
        // Get meta tags from database
        $sql = "SELECT * FROM meta_tags";
        $result = $conn->query($sql);
        $metaTags = array();
        while ($row = $result->fetch_assoc()) {
            $metaTags[] = $row;
        }
        return $metaTags;
    }

    public function getSitemap() {
        // Get sitemap from database
        $sql = "SELECT * FROM sitemap";
        $result = $conn->query($sql);
        $sitemap = array();
        while ($row = $result->fetch_assoc()) {
            $sitemap[] = $row;
        }
        return $sitemap;
    }
}
?>
