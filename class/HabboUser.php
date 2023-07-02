<?php
Class User {
    // USER DISPLAY INFORMATION
    public function UserData($userid, $column) {
        $db = new Database();
        $usersQuery = $db->prepare("SELECT $column FROM users WHERE id = :id");
        $usersQuery->execute(array(':id' => $userid));
        if($usersQuery->rowCount() == 1) {
            $users = $usersQuery->fetch(PDO::FETCH_ASSOC);
            return $users[$column];
        } else {
            return false;
        }
    }
    
    public function ComplementsData($userid, $column) {
        $db = new Database();
        $usersComplementsQuery = $db->prepare("SELECT $column FROM hbeta_users_complements WHERE user_id = :user_id");
        $usersComplementsQuery->execute(array(':user_id' => $userid));
        if($usersComplementsQuery->rowCount() == 1) {
            $usersComplements = $usersComplementsQuery->fetch(PDO::FETCH_ASSOC);
            return $usersComplements[$column];
        } else {
            return false;
        }
    }

    public function CurrencyData($userid, $type) {
        $db = new Database();
        $usersCurrencyQuery = $db->prepare("SELECT amount FROM users_currency WHERE user_id = :user_id AND type = :type");
        $usersCurrencyQuery->execute(array(':user_id' => $userid, ':type' => $type));
        if($usersCurrencyQuery->rowCount() == 1) {
            $usersCurrency = $usersCurrencyQuery->fetch(PDO::FETCH_ASSOC);
            return $usersCurrency['amount'];
        } else {
            return false;
        }
    }

    public function SettingsData($userid, $column) {
        $db = new Database();
        $usersSettingsQuery = $db->prepare("SELECT $column FROM users_settings WHERE user_id = :user_id");
        $usersSettingsQuery->execute(array(':user_id' => $userid));
        if($usersSettingsQuery->rowCount() == 1) {
            $usersSettings = $usersSettingsQuery->fetch(PDO::FETCH_ASSOC);
            return $usersSettings[$column];
        } else {
            return false;
        }
    }

    public function PermissionsData($rankid, $column) {
        $db = new Database();
        $permissionsQuery = $db->prepare("SELECT $column FROM permissions WHERE id = :id");
        $permissionsQuery->execute(array(':id' => $rankid));
        if($permissionsQuery->rowCount() == 1) {
            $permissions = $permissionsQuery->fetch(PDO::FETCH_ASSOC);
            return $permissions[$column];
        } else {
            return false;
        }
    }

    // USER IP ADRESS
    public function IPAdress() {
        return $_SERVER['REMOTE_ADDR'];
    }

    // USER ONLINE/OFFLINE
    public function UserisOnline() {
        if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
            header('Location: /profil');
            exit();
        }
    }

    public function UserisOffline() {
        if(!isset($_SESSION['user_id']) && empty($_SESSION['user_id'])) {
            header('Location: /index');
            exit();
        }
    }

    public function UserPING() {
        if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
            $db = new Database();
            $usersQuery = $db->prepare("SELECT id FROM users WHERE id = :id");
            $usersQuery->execute(array(':id' => $_SESSION['user_id']));
            if($usersQuery->rowCount() == 0) {
                session_destroy();
                header('Location: /index');
                exit();
            }
            $usersQuery = $db->prepare("UPDATE users SET last_online = :last_online WHERE id = :id");
            $usersQuery->execute(array(':last_online' => time(), ':id' => $_SESSION['user_id']));
            $usersComplementsQuery = $db->prepare("SELECT id FROM hbeta_users_complements WHERE user_id = :user_id");
            $usersComplementsQuery->execute(array(':user_id' => $_SESSION['user_id']));
            if($usersComplementsQuery->rowCount() == 0) {
                session_destroy();
                header('Location: /index');
                exit();
            }
            global $user;
            if($user->UserData($_SESSION['user_id'], 'ip_current') != $user->IPAdress()) {
                $usersQuery = $db->prepare("UPDATE users SET ip_current = :ip_current WHERE id = :id");
                $usersQuery->execute(array(':ip_current' => $user->IPAdress(), ':id' => $_SESSION['user_id']));
            }
        }
    }
}
$user = new User();

// LOADING FUNCTIONS
$user->UserPING();