<?PHP
    include_once "Base.php";

    class Courses extends Base {

        private $dateStart;
        private $dateFinish;
        private $nameCourse;
        private $description;

        public function __construct() {
            $this->Connect();
        }

        public function inserir() {

            $query = "INSERT INTO courses (description, nameCourse, dateFinish, dateStart) VALUES (:description, :nameCourse, :dateFinish, :dateStart) ";

            try {
                $consulta = $this->db->prepare($query);

                $consulta->execute(array(
                    "description" => $this->getDescription(),
                    "nameCourse" => $this->getNameCourse(),
                    "dateFinish" => $this->getDateFinish(),
                    "dateStart" => $this->getDateStart()
                ));

            } catch( PDOException $Exception ) {
                return false;
            }
            return true;
        }

        public function listar() {
            $query = "SELECT * FROM courses ";

            try {
                $consulta = $this->db->prepare($query);
                $consulta->execute();

                $cursos = array();
                while ($item = $consulta->fetchObject()) {

                    $curso = new Courses();
                    $curso->setId($item->id);
                    $curso->setStatus($item->status);
                    $curso->setDateStart(new Datetime($item->dateStart));
                    $curso->setNameCourse($item->nameCourse);
                    $curso->setCreated_at(new Datetime($item->created_at));
                    $curso->setUpdated_at(new Datetime($item->updated_at));
                    $curso->setDateFinish(new Datetime($item->dateFinish));
                    $curso->setDescription($item->description);

                    $cursos[] = $curso;
                }

                return $cursos;
            } catch( PDOException $Exception ) {
                return false;
            }
            return false;
        }

        public function get($id) {
            $query = "SELECT * FROM courses WHERE id = :id LIMIT 1 ";

            try {
                $consulta = $this->db->prepare($query);
                $consulta->execute(array(
                    "id" => $id
                ));

                $item = $consulta->fetchObject();

                if ($item) {
                    $curso = new Courses();
                    $curso->setId($item->id);
                    $curso->setStatus($item->status);
                    $curso->setDateStart(($item->dateStart));
                    $curso->setNameCourse($item->nameCourse);
                    $curso->setCreated_at(new Datetime($item->created_at));
                    $curso->setUpdated_at(new Datetime($item->updated_at));
                    $curso->setDateFinish(($item->dateFinish));
                    $curso->setDescription($item->description);

                    return $curso;
                }
                return false;
            } catch( PDOException $Exception ) {
                return false;
            }
            return false;
        }

        public function update() {

            $query = "UPDATE courses SET nameCourse = :nameCourse, description = :description, dateStart = :dateStart, dateFinish = :dateFinish, status = :status WHERE id = :id LIMIT 1 ";

            try {
                $consulta = $this->db->prepare($query);

                $consulta->execute(array(
                    "description" => $this->getDescription(),
                    "nameCourse" => $this->getNameCourse(),
                    "dateFinish" => $this->getDateFinish(),
                    "dateStart" => $this->getDateStart(),
                    "status" => $this->getStatus(),
                    "id" => $this->getId()
                ));

            } catch( PDOException $Exception ) {
                return false;
            }
            return true;
        }

        public function setDescription($description) {
            $this->description = $description;
        }

        public function getDescription() {
            return $this->description;
        }

        public function setNameCourse($nameCourse) {
            $this->nameCourse = $nameCourse;
        }

        public function getNameCourse() {
            return $this->nameCourse;
        }

        public function setDateFinish($dateFinish) {
            $this->dateFinish = $dateFinish;
        }

        public function getDateFinish() {
            return $this->dateFinish;
        }

        public function setDateStart($dateStart) {
            $this->dateStart = $dateStart;
        }

        public function getDateStart() {
            return $this->dateStart;
        }
    }
?>