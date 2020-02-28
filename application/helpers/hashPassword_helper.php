<?php
  function hash_password($password) {		
    return password_hash($password, PASSWORD_BCRYPT);
  }

  function verify_password_hash($password, $hash) {
    return password_verify($password, $hash);
  }