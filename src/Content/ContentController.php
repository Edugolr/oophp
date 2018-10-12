<?php

namespace Chai17\Content;

/**
 *
 */
use Chai17\Filter as filter;
use Anax\Url as url;
use Anax\Commons\AppInjectableInterface;
use Anax\Commons\AppInjectableTrait;

class ContentController implements AppInjectableInterface
{
    use AppInjectableTrait;
    public function indexActionGet()
    {
        $title = "Content Database | oophp ";
        $this->app->db->connect();
        $sql = "SELECT * FROM content WHERE deleted IS NULL;";
        $res = $this->app->db->executeFetchAll($sql);
        $this->app->page->add("content/index", [
            "res" => $res,
        ]);

        return $this->app->page->render([
            "title" => $title,
        ]);
    }
    public function editActionGet($id)
    {
        $converter = new filter\Filter;
        $title = "Edit Content | oophp ";
        $this->app->db->connect();
        $params = [$id];
        $sql = "SELECT * FROM content WHERE id=?;";
        $res = $this->app->db->executeFetch($sql, $params);
        $this->app->page->add("content/edit-form", [
            "res" => $res,
            "filters" => $converter->getFilters(),
        ]);

        return $this->app->page->render([
            "title" => $title,
        ]);
    }
    public function saveActionPost()
    {
        $urlFunc = new url\Url;
        $id = $this->app->request->getPost('id');
        $title = $this->app->request->getPost('title');
        $data = $this->app->request->getPost('data');
        $filter = $this->app->request->getPost('filter_array');
        $path = $this->app->request->getPost('path');
        $slug = $this->app->request->getPost('slug');
        $type = $this->app->request->getPost('type');

        if (!$slug) {
            $slug = $urlFunc->slugify($title);
        }
        $this->app->db->connect();
        $query = "SELECT COUNT(*) AS NumHits FROM content WHERE  slug  LIKE '$slug%'";
        $result = $this->app->db->executeFetch($query);
        if ($result->NumHits > 0) {
            $slug = $urlFunc->slugify($slug . "-" . $result->NumHits);
        }
        if (!$path) {
            $path = null;
        }

        $params = [$title, $data, implode(",", $filter), $path, $slug, $type, $id];

        $this->app->db->connect();
        $sql = "UPDATE content SET title=?, data=?, filter=?, path=?, slug=?, type=? WHERE id=?;";
        $this->app->db->execute($sql, $params);


        return $this->app->response->redirect("content/edit/$id");
    }
    public function createActionPost()
    {
        $urlFunc = new url\Url;
        $path = $this->app->request->getPost('path');
        $title = $this->app->request->getPost('title');
        $data = $this->app->request->getPost('data');
        $slug = $this->app->request->getPost('slug');
        $type = $this->app->request->getPost('type');
        $filter = $this->app->request->getPost('filter_array');

        if (!$slug) {
            $slug = $urlFunc->slugify($title);
        }
        $this->app->db->connect();
        $query = "SELECT COUNT(*) AS NumHits FROM content WHERE  slug  LIKE '$slug%'";
        $result = $this->app->db->executeFetch($query);
        if ($result->NumHits > 0) {
            $slug = $urlFunc->slugify($slug . "-" . $result->NumHits);
        }
        if (!$path) {
            $path = null;
        }
        $params = [$title, $data, $type, $slug, $path, implode(",", $filter)];

        $this->app->db->connect();
        $sql = "INSERT INTO content (title, data, type, slug, path, filter) VALUES (?, ?, ?, ?, ?, ?);";
        $this->app->db->execute($sql, $params);

        return $this->app->response->redirect("content/index");
    }
    public function createActionGet()
    {
        $converter = new filter\Filter;
        $title = "Content Create | oophp ";
        $this->app->page->add("content/create", [
            "filters" => $converter->getFilters(),
        ]);
        return $this->app->page->render([
            "title" => $title,
        ]);
    }
    public function deleteActionGet($id)
    {
        $this->app->db->connect();
        $params = [$id];
        $sql = "UPDATE content SET deleted = current_timestamp  WHERE id=?";
        $this->app->db->execute($sql, $params);

        return $this->app->response->redirect("content/index");
    }
    public function readActionGet($id)
    {
        $converter = new filter\Filter;
        $title = "Read Content | oophp ";
        $this->app->db->connect();
        $params = [$id, $id, $id];
        $sql = "SELECT * FROM content WHERE slug=? OR path=? OR id=?;";
        $res = $this->app->db->executeFetch($sql, $params);
        if ($res->filter) {
            $filters = explode(",", $res->filter);
            $res->data = $converter->parse($res->data, $filters);
        }
        if ($res->type=="page") {
            $this->app->page->add("content/readPage", [
                "res" => $res,
            ]);
        }
        if ($res->type=="post") {
            $this->app->page->add("content/readBlogg", [
                "res" => $res,
            ]);
        }

        return $this->app->page->render([
            "title" => $title,
        ]);
    }
    public function bloggActionGet()
    {
        $converter = new filter\Filter;
        $title = "Blogg | oophp ";
        $this->app->db->connect();
        $params = ['post'];
        $sql = "SELECT * FROM content WHERE type=?;";
        $res = $this->app->db->executeFetchAll($sql, $params);
        foreach ($res as $row) {
            if ($row->filter) {
                $filters = explode(",", $row->filter);
                $row->data = $converter->parse($row->data, $filters);
            }
        }
        $this->app->page->add("content/blogg", [
            "res" => $res,
        ]);
        return $this->app->page->render([
            "title" => $title,
        ]);
    }
    public function pageActionGet()
    {
        $converter = new filter\Filter;
        $title = "Blogg | oophp ";
        $this->app->db->connect();
        $params = ['page'];
        $sql = "SELECT * FROM content WHERE type=?;";
        $res = $this->app->db->executeFetchAll($sql, $params);
        foreach ($res as $row) {
            if ($row->filter) {
                $filters = explode(",", $row->filter);
                $row->data = $converter->parse($row->data, $filters);
            }
        }
        $this->app->page->add("content/page", [
            "res" => $res,
        ]);
        return $this->app->page->render([
            "title" => $title,
        ]);
    }
}
