<?php
namespace App\Http\Controllers;

use App\Models\Flag;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FlagController extends Controller
{
    // Display All Data
    public function index()
    {
        try {
            $flags = Flag::all();
            return response()->json([
                'data' => $flags,
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return $this->handleException($e);
        }
    }

    // Store Data
    public function store(Request $request)
    {
        try {
            $request->validate([
                'flag_name' => 'required',
                'flag_official' => 'required',
                'flag_desc' => 'required',
                'flag_population' => 'required|integer',
                'flag_timezone' => 'required',
                'flag_continents' => 'required',
            ]);

            $flag = Flag::create($request->all());

            if ($flag) {
                return response()->json([
                    'message' => 'Flag created successfully',
                ], Response::HTTP_CREATED);
            }
        } catch (\Exception $e) {
            return $this->handleException($e);
        }
    }

    // View Edit Data
    public function edit(string $id)
    {
        try {
            $flag = Flag::findOrFail($id);

            return response()->json([
                'data' => $flag,
                'message' => 'Flag retrieved for editing',
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return $this->handleException($e);
        }
    }

    // Update Data
    public function update(Request $request, string $id)
    {
        try {
            $flag = Flag::findOrFail($id);

            $request->validate([
                'flag_name' => 'required',
                'flag_official' => 'required',
                'flag_desc' => 'required',
                'flag_population' => 'required|integer',
                'flag_timezone' => 'required',
                'flag_continents' => 'required',
            ]);

            $flag->update($request->all());

            return response()->json([
                'message' => 'Flag updated successfully',
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return $this->handleException($e);
        }
    }

    // Destroy Data
    public function destroy(string $id)
    {
        try {
            $flag = Flag::findOrFail($id);

            if ($flag->delete()) {
                return response()->json([
                    'message' => 'Flag deleted successfully',
                ], Response::HTTP_NO_CONTENT);
            }
        } catch (\Exception $e) {
            return $this->handleException($e);
        }
    }

    // Display Error 
    private function handleException(\Exception $e)
    {
        $errorMessage = $e->getMessage();
        $errorCode = $e->getCode();

        $response = [
            'success' => false,
            'error' => [
                'code' => $errorCode,
                'message' => $errorMessage,
            ],
        ];

        if ($e instanceof \Illuminate\Validation\ValidationException) {
            $response['error']['details'] = $e->errors();
        }

        return response()->json($response, Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}

?>