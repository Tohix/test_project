<?php
include_once('../config/config.php');

// ��������� ���������� � ����� ������
$mysqli = new mysqli($db['host'], $db['username'], $db['password'], $db['database']);

// ������� ���� ������. ������ �� �� ��������� ������ � ������ ���� � ���� ������, � �� ��� �������. ��� ��������� ��� ���������� ������
// ���� �� ������, ��� ��� �� ��� ��������� ����� ������, ����� ������� � �������� ���� ������ � ���� ������ �� ����� ������ �������������.
// �� ���� �� ����� ������ ��� � ������������ �� ��� �� �����. ��� ���� �������, ���� ������������� �����-�� ������� ������� ������ � ����,
// ��� �� ��������� �� �� ����� ������� � �� �������������� ����.
$passwordHash = password_hash($_POST['password'], PASSWORD_DEFAULT );

$query = "INSERT INTO user (id, email, password_hash, first_name, last_name, is_confirmed) VALUES (NULL , '" . $_POST['email'] . "', '" . $passwordHash . "' ,NULL, NULL , 0)";

if (!$mysqli->query($query)) {
    echo 'Error: ' . $mysqli->error; die;
}

// ��������� ���������� � ����� ������. ���� ������ ��������� ���������� ������ ������ �������.
//���� � ������� ����� �� ������� ����� �� ���������� ������� ���������� � ����� ������ ����� ���������
$mysqli->close();
