<?PHP
    include_once "Base.php";

    class Student extends Base {

        private $name;
        private $email;
        private $password;
        private $phone;
        private $course;

        public function __construct() {
            $this->Connect();
        }

        public function setCourse($course) {
            $this->course = $course;
        }

        public function getCourse() {
            return $this->course;
        }

        public function setPhone($phone) {
            $this->phone = $phone;
        }

        public function getPhone() {
            return $this->phone;
        }

        public function setPassword($password) {
            $this->password = $password;
        }

        public function getPassword() {
            return $this->password;
        }

        public function setEmail($email) {
            $this->email = $email;
        }

        public function getEmail() {
            return $this->email;
        }

        public function setName($name) {
            $this->name = $name;
        }

        public function getName() {
            return $this->name;
        }

        public function inserir() {

            $query = "INSERT INTO students (name, email, password, phone, idCourse) VALUES (:name, :email, :password, :phone, :idCourse) ";

            try {
                $consulta = $this->db->prepare($query);

                $consulta->execute(array(
                    "name" => $this->getName(),
                    "email" => $this->getEmail(),
                    "password" => $this->getPassword(),
                    "phone" => $this->getPhone(),
                    "idCourse" => $this->getCourse()
                ));

            } catch( PDOException $Exception ) {
                return false;
            }
            return true;
        }

        public function listar() {
            $query = "SELECT * FROM students ";

            try {
                $consulta = $this->db->prepare($query);
                $consulta->execute();

                $alunos = array();
                while ($item = $consulta->fetchObject()) {

                    $aluno = new Student();
                    $aluno->setId($item->id);
                    $aluno->setStatus($item->status);
                    $aluno->setName($item->name);
                    $aluno->setEmail($item->email);
                    $aluno->setCreated_at(new Datetime($item->created_at));
                    $aluno->setUpdated_at(new Datetime($item->updated_at));
                    $aluno->setPhone(($item->phone));
                    $aluno->setCourse($item->idCourse);

                    $alunos[] = $aluno;
                }

                return $alunos;
            } catch( PDOException $Exception ) {
                return false;
            }
            return false;
        }

        public function get($id) {
            $query = "SELECT * FROM students WHERE id = :id LIMIT 1 ";

            try {
                $consulta = $this->db->prepare($query);
                $consulta->execute(array(
                    "id" => $id
                ));

                $item = $consulta->fetchObject();

                if ($item) {
                    $aluno = new Student();
                    $aluno->setId($item->id);
                    $aluno->setStatus($item->status);
                    $aluno->setName($item->name);
                    $aluno->setEmail($item->email);
                    $aluno->setCreated_at(new Datetime($item->created_at));
                    $aluno->setUpdated_at(new Datetime($item->updated_at));
                    $aluno->setPhone(($item->phone));
                    $aluno->setCourse($item->idCourse);

                    return $aluno;
                }
                return false;
            } catch( PDOException $Exception ) {
                return false;
            }
            return false;
        }

        public function update() {

            $query = "UPDATE students SET name = :name, email = :email, password = :password, phone = :phone, status = :status, idCourse = :idCourse WHERE id = :id LIMIT 1 ";

            try {
                $consulta = $this->db->prepare($query);

                $consulta->execute(array(
                    "name" => $this->getName(),
                    "email" => $this->getEmail(),
                    "password" => $this->getPassword(),
                    "phone" => $this->getPhone(),
                    "status" => $this->getStatus(),
                    "id" => $this->getId(),
                    "idCourse" => $this->getCourse()
                ));

            } catch( PDOException $Exception ) {
                return false;
            }
            return true;
        }

        public function delete($id) {

            $query = "DELETE FROM students WHERE id = :id LIMIT 1";

            try {
                $consulta = $this->db->prepare($query);
                $consulta->execute(array(
                    "id" => $id
                ));

            } catch( PDOException $Exception ) {
                return false;
            }
            return true;
        }
    }
?>