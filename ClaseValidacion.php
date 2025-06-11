<?PHP
class FormValidator {
    private $data;
    private $requiredFields = [];

    public function __construct($postData) {
        $this->data = $postData;
    }

    public function setRequiredFields(array $fields) {
        $this->requiredFields = $fields;
    }

    public function validate() {
        $this->validateRequiredFields();
        $this->validateEmailFormat();
        $this->validatePhoneFormat();
    }

    private function validateRequiredFields() {
        foreach ($this->requiredFields as $field) {
            if (empty($this->data[$field])) {
                throw new Exception("{$field} is required.");
            }
        }
    }

    private function validateEmailFormat() {
        if (!filter_var($this->data['email'], FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Invalid email format.");
        }
    }

    private function validatePhoneFormat() {
        if (!preg_match("/^\d{3}-\d{3}-\d{4}$/", $this->data['phone'])) {
            throw new Exception("Invalid phone format. Use 123-456-7890.");
        }
    }
}
?>
