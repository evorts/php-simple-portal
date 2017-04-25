<?php
/**
 * author: steven
 * date: 4/25/17 2:28 PM
 */

namespace Portal\Common\Library;

use SQLite3;

class SessionHandlerSqlite implements \SessionHandlerInterface
{

    /** @var  \SQLite3 */
    private static $sqlite = null;

    /** @var  string */
    private $filename;

    /** @var int  */
    private $expired = 24 * 60 * 60;

    /**
     * @param string $filename
     *
     * @return \SQLite3
     */
    public function getSqliteInstance($filename = '')
    {
        if (!empty($filename)) {
            $this->setFilename($filename);
        }

        if (self::$sqlite == null) {
            self::$sqlite = new SQLite3($this->getFilename(), SQLITE3_OPEN_READWRITE | SQLITE3_OPEN_CREATE);
        } else if (!empty($filename)) {
            self::$sqlite->open($this->getFilename());
        }

        return self::$sqlite;
    }

    /**
     * @return string
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * @param string $filename
     */
    public function setFilename($filename)
    {
        $this->filename = $filename;
    }

    /**
     * @return int
     */
    public function getExpired()
    {
        return $this->expired;
    }

    /**
     * @param int $expired
     */
    public function setExpired($expired)
    {
        $this->expired = $expired;
    }

    /**
     * Close the session
     * @link http://php.net/manual/en/sessionhandlerinterface.close.php
     * @return bool <p>
     * The return value (usually TRUE on success, FALSE on failure).
     * Note this value is returned internally to PHP for processing.
     * </p>
     * @since 5.4.0
     */
    public function close()
    {
        return true;
    }

    /**
     * Destroy a session
     * @link http://php.net/manual/en/sessionhandlerinterface.destroy.php
     *
     * @param string $session_id The session ID being destroyed.
     *
     * @return bool <p>
     * The return value (usually TRUE on success, FALSE on failure).
     * Note this value is returned internally to PHP for processing.
     * </p>
     * @since 5.4.0
     */
    public function destroy($session_id)
    {
        /** @noinspection SqlNoDataSourceInspection */
        /** @noinspection SqlResolve */
        $statement = $this->getSqliteInstance()->prepare("DELETE FROM sessions WHERE session_id=:session_id");
        $statement->bindParam('session_id', $session_id);
        return $statement->execute() !== false;
    }

    /**
     * Cleanup old sessions
     * @link http://php.net/manual/en/sessionhandlerinterface.gc.php
     *
     * @param int $maxlifetime <p>
     * Sessions that have not updated for
     * the last maxlifetime seconds will be removed.
     * </p>
     *
     * @return bool <p>
     * The return value (usually TRUE on success, FALSE on failure).
     * Note this value is returned internally to PHP for processing.
     * </p>
     * @since 5.4.0
     */
    public function gc($maxlifetime)
    {
        return true;
    }

    /**
     * Initialize session
     * @link http://php.net/manual/en/sessionhandlerinterface.open.php
     *
     * @param string $save_path The path where to store/retrieve the session.
     * @param string $name The session name.
     *
     * @return bool <p>
     * The return value (usually TRUE on success, FALSE on failure).
     * Note this value is returned internally to PHP for processing.
     * </p>
     * @since 5.4.0
     */
    public function open($save_path, $name)
    {
        $this->getSqliteInstance($save_path);
        return true;
    }

    /**
     * Read session data
     * @link http://php.net/manual/en/sessionhandlerinterface.read.php
     *
     * @param string $session_id The session id to read data for.
     *
     * @return string <p>
     * Returns an encoded string of the read data.
     * If nothing was read, it must return an empty string.
     * Note this value is returned internally to PHP for processing.
     * </p>
     * @since 5.4.0
     */
    public function read($session_id)
    {
        /** @noinspection SqlNoDataSourceInspection */
        /** @noinspection SqlResolve */
        $statement = $this->getSqliteInstance()->prepare("SELECT session_content, expired FROM sessions WHERE session_id=:session_id");
        $statement->bindValue(':session_id', $session_id);
        $result = $statement->execute();

        if ($rows = $result->fetchArray()) {
            return $rows['session_content'];
        }
        return '';
    }

    /**
     * Write session data
     * @link http://php.net/manual/en/sessionhandlerinterface.write.php
     *
     * @param string $session_id The session id.
     * @param string $session_data <p>
     * The encoded session data. This data is the
     * result of the PHP internally encoding
     * the $_SESSION superglobal to a serialized
     * string and passing it as this parameter.
     * Please note sessions use an alternative serialization method.
     * </p>
     *
     * @return bool <p>
     * The return value (usually TRUE on success, FALSE on failure).
     * Note this value is returned internally to PHP for processing.
     * </p>
     * @since 5.4.0
     */
    public function write($session_id, $session_data)
    {
        /** @noinspection SqlNoDataSourceInspection */
        /** @noinspection SqlResolve */
        $statement = $this->getSqliteInstance()->prepare("SELECT session_id FROM sessions WHERE session_id=:session_id");
        $statement->bindValue('session_id', $session_id);
        $result = $statement->execute();

        if (!empty($result->fetchArray())) {
            /** @noinspection SqlNoDataSourceInspection */
            /** @noinspection SqlResolve */
            $statement = $this->getSqliteInstance()->prepare("UPDATE sessions SET session_content=:session_content WHERE session_id=:session_id");
        } else {
            /** @noinspection SqlNoDataSourceInspection */
            /** @noinspection SqlResolve */
            $statement = $this->getSqliteInstance()->prepare("INSERT INTO sessions VALUES(:session_id, :session_content, :expired)");
            $statement->bindValue('expired', time() + $this->getExpired());
        }

        $statement->bindValue('session_id', $session_id);
        $statement->bindValue('session_content', $session_data);
        $statement->execute();
        return true;
    }
}