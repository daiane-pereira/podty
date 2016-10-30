<?php
namespace App\Podty;

class Users
{
    private $api;

    public function __construct(ApiClient $apiClient)
    {
        $this->api = $apiClient;
    }

    public function get($username)
    {
        return $this->api->get('users/' . $username);
    }

    public function touch($username)
    {
        return $this->api->patch('users/' . $username . '/touch');
    }

    public function friends($username)
    {
        return $this->returnDefaultResponse(
            $this->api->get('users/' . $username . '/friends')
        );
    }

    public function follow($authUser, $targetUser)
    {
        return $this->api->post('users/' . $authUser . '/friends/' . $targetUser);
    }

    public function unfollow($authUser, $targetUser)
    {
        return $this->api->delete('users/' . $authUser . '/friends/' . $targetUser);
    }

    private function returnDefaultResponse($response)
    {
        return $response ? collect($response['data']) : collect([]);
    }
}
