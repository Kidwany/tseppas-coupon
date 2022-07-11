<?php


namespace App\Helpers;


use Google\Cloud\Core\Exception\GoogleException;
use Google\Cloud\Firestore\FirestoreClient;

/**
 * Class GoogleFirestore
 * @package App\Helpers
 */
class GoogleFirestore
{
    /**
     * @var
     */
    private $firestoreProjectID;
    /**
     * @var
     */
    private $collection;
    /**
     * @var
     */
    private $document;
    /**
     * @var
     */
    private $field;


    /**
     * GoogleFirestore constructor.
     * @param $collection
     * @param $document
     * @param $field
     */
    public function __construct($collection, $document, $field)
    {
        $this->setFirestoreProjectID(config("google_credentials.FIRESTORE_PROJECT_ID"));
        $this->setCollection($collection);
        $this->setDocument($document);
        $this->setField($field);
    }

    /**
     * @return mixed
     */
    public function getField()
    {
        return $this->field;
    }

    /**
     * @param mixed $field
     */
    public function setField($field): void
    {
        $this->field = $field;
    }

    /**
     * @return mixed
     */
    public function getCollection()
    {
        return $this->collection;
    }

    /**
     * @param mixed $collection
     */
    public function setCollection($collection): void
    {
        $this->collection = $collection;
    }

    /**
     * @return mixed
     */
    public function getDocument()
    {
        return $this->document;
    }

    /**
     * @param mixed $document
     */
    public function setDocument($document): void
    {
        $this->document = $document;
    }

    /**
     * @return mixed
     */
    public function getFirestoreProjectID()
    {
        return $this->firestoreProjectID;
    }

    /**
     * @param mixed $firestoreProjectID
     */
    public function setFirestoreProjectID($firestoreProjectID): void
    {
        $this->firestoreProjectID = $firestoreProjectID;
    }

    /**
     * @return array|null
     */
    public function queryData(){
        try {
            $db = new FirestoreClient([
                'projectId' => $this->getFirestoreProjectID(),
            ]);
            return $docRef = $db->collection($this->getCollection())->document($this->getDocument())->snapshot()->data();
        } catch (GoogleException $e) {
        }
    }

}
