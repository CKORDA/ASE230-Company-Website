<?php
include_once __DIR__ . '/JSONHelper.php';

class TeamMember
{
    private $id;
    private $name;
    private $position;
    private $bio;

    public function __construct($id, $name, $position, $bio)
    {
        $this->id = $id;
        $this->name = $name;
        $this->position = $position;
        $this->bio = $bio;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPosition()
    {
        return $this->position;
    }

    public function getBio()
    {
        return $this->bio;
    }
}

function getAllTeamMembers()
{
    $teamMembersData = JSONHelper::readJSON();
    $teamMembers = [];

    foreach ($teamMembersData as $memberData) {
        $teamMembers[] = new TeamMember(
            $memberData['id'],
            $memberData['name'],
            $memberData['position'],
            $memberData['bio']
        );
    }

    return $teamMembers;
}

function getTeamMember($id)
{
    $teamMembersData = JSONHelper::readJSON();

    foreach ($teamMembersData as $memberData) {
        if ($memberData['id'] == $id) {
            return new TeamMember(
                $memberData['id'],
                $memberData['name'],
                $memberData['position'],
                $memberData['bio']
            );
        }
    }

    return null;
}

function createTeamMember($data)
{
    $teamMembersData = JSONHelper::readJSON();

    $newId = count($teamMembersData) + 1;
    $data['id'] = $newId;
    $teamMembersData[] = $data;

    JSONHelper::writeJSON($teamMembersData);

    return $newId; // Return the last insert ID
}


function updateTeamMember($id, $data)
{
    $teamMembersData = JSONHelper::readJSON();

    foreach ($teamMembersData as &$memberData) {
        if ($memberData['id'] == $id) {
            $memberData = array_merge($memberData, $data);
            break;
        }
    }

    JSONHelper::writeJSON($teamMembersData);
}

function deleteTeamMember($id)
{
    $teamMembersData = JSONHelper::readJSON();

    foreach ($teamMembersData as $key => $memberData) {
        if ($memberData['id'] == $id) {
            unset($teamMembersData[$key]);
            break;
        }
    }

    JSONHelper::writeJSON($teamMembersData);
}
?>
