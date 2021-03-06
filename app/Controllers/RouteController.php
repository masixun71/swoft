<?php

namespace App\Controllers;

use Swoft\Http\Server\Bean\Annotation\Controller;
use Swoft\Http\Server\Bean\Annotation\RequestMapping;
use Swoft\Http\Message\Server\Request;
use Swoft\Http\Message\Server\Response;

/**
 * action demo
 *
 * @Controller(prefix="/route")
 */
class RouteController
{
    /**
     * @RequestMapping()
     */
    public function index()
    {
        return 'index';
    }

    /**
     * @RequestMapping(route="user/{uid}/book/{bid}/{bool}/{name}")
     *
     * @param bool                $bool
     * @param Request  $request
     * @param int                 $bid
     * @param string              $name
     * @param int                 $uid
     * @param Response $response
     *
     * @return array
     */
    public function funcArgs(bool $bool, Request $request, int $bid, string $name, int $uid, Response $response)
    {
        return [$bid, $uid, $bool, $name, get_class($request), get_class($response)];
    }

    /**
     * @RequestMapping(route="hasNotArg")
     *
     * @return string
     */
    public function hasNotArgs()
    {
        return 'hasNotArg';
    }

    /**
     * @RequestMapping(route="hasAnyArgs/{bid}")
     * @param Request $request
     * @param int                $bid
     *
     * @return string
     */
    public function hasAnyArgs(Request $request, int $bid)
    {
        return [get_class($request), $bid];
    }

    /**
     * @RequestMapping(route="hasMoreArgs")
     *
     * @param Request $request
     * @param int                $bid
     *
     * @return array
     */
    public function hasMoreArgs(Request $request, int $bid)
    {
        return [get_class($request), $bid];
    }

    /**
     * optional parameter
     *
     * @RequestMapping(route="opntion[/{name}]")
     *
     * @param string $name
     * @return array
     */
    public function optionalParameter(string $name)
    {
        return[$name];
    }

    /**
     * optional parameter
     *
     * @RequestMapping(route="anyName/{name}")
     *
     * @param string $name
     * @return array
     */
    public function funcAnyName(string $name)
    {
        return [$name];
    }

    /**
     * @param Request $request
     *
     * @return array
     */
    public function notAnnotation(Request $request)
    {
        return [get_class($request)];
    }

    /**
     * @param Request $request
     *
     * @return array
     */
    public function onlyFunc(Request $request)
    {
        return [get_class($request)];
    }

    /**
     * @param Request $request
     *
     * @return array
     */
    public function behind(Request $request)
    {
        return [get_class($request)];
    }
}