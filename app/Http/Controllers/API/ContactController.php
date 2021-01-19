<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * @OA\Post(
     *      path="/contact",
     *      operationId="send_message",
     *      tags={"Contact"},
     *      summary="Contact Message Endpoint",
     *      description="Send Message",
     *     @OA\RequestBody(
     *          required=true,
     *          @OA\MediaType(mediaType="multipart/form-data",
     *              @OA\Schema(
     *                  required={"name","email","phone","message"},
     *                  @OA\Property(
     *                      property="name",
     *                      type="string",
     *                      description="Sender Name"
     *                  ),
     *                  @OA\Property(
     *                      property="email",
     *                      type="string",
     *                      description="Sender Email"
     *                  ),
     *                  @OA\Property(
     *                      property="phone",
     *                      type="string",
     *                      description="Sender Phone"
     *                  ),
     *                  @OA\Property(
     *                      property="message",
     *                      type="string",
     *                      description="Message Content"
     *                  ),
     *             )
     *         )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="not found"
     *      ),
     *     )
     * @param ContactRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(ContactRequest $request)
    {
        Contact::create($request->input());

        return response()->json(['message' => 'Request Send Successfully'], 200);
    }
}
