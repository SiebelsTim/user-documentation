<?hh // strict

use Psr\Http\Message\ServerRequestInterface;

final class HHVMDocumentationSite {
  public async function respondTo(
    ServerRequestInterface $request,
  ): Awaitable<void> {
    try {
      list($controller, $vars) = (new Router())->routeRequest($request);
      await (new $controller($vars))->respond();
    } catch (HTTPException $e) {
      $e->respond();
    }
  }
}
