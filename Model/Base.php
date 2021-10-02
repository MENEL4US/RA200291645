<?PHP
    include_once "Database.php";

    class Base {

        private $id;
        private $status;
        private $created_at;
        private $updated_at;

        function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function setStatus($status) {
            $this->status = $status;
        }

        public function setCreated_at($created_at) {
            $this->created_at = $created_at;
        }

        public function setUpdated_at($updated_at) {
            $this->updated_at = $updated_at;
        }

        function getStatus() {
            return $this->status;
        }

        function getCreated_at() {
            return $this->created_at;
        }

        function getUpdated_at() {
            return $this->updated_at;
        }

        public function Connect() {
            $db = new Database();
            $this->db = $db->connect();
        }

        
    }
?>