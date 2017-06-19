<?php
/**
 * Created by PhpStorm.
 * User: rehellinen
 * Date: 2017/4/14
 * Time: 18:06
 */
namespace Common\Model;
use Think\Model;
class NewsContentModel extends  Model
{
    private $_db = '';

    /**
     * public:权限是最大的，可以内部调用，实例调用等。
     * protected: 受保护类型，用于本类和继承类调用。
     * private: 私有类型，只有在本类中使用。
     */

    public function __construct()
    {
        $this->_db = M('news_content');
    }

    public function insert($data = array())
    {
        if (!$data || !is_array($data)) {
            return 0;
        }
        $data['create_time'] = time();
        if (isset($data['content']) && $data['content']) {
            $data['content'] = htmlspecialchars($data['content']);
        }
        return $this->_db->add($data);
    }

    public function find($id)
    {

        return $this->_db->where('news_id=' . $id)->find();
    }

    public function updateNewsById($id, $data)
    {
        if (!$id || !is_numeric($id)) {
            throw_exception("ID不合法");
        }
        if (!$data || !is_array($data)) {
            throw_exception("更新数据不合法");
        }
        if (isset($data['content']) && $data['content']) {
            $data['content'] = htmlspecialchars($data['content']);
        }

        return $this->_db->where('news_id=' . $id)->save($data);
    }

}