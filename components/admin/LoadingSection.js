import {ClockIcon, CogIcon} from "@heroicons/react/solid";

export default function LoadingSection({children}) {
    return (
        <div className="rounded-lg bg-blue-50 p-4">
            <div className="flex">
                <div className="flex-shrink-0">
                    <CogIcon className="animate-spin h-5 w-5 text-blue-400" aria-hidden="true"/>
                </div>
                <div className="ml-3 flex-1 md:flex md:justify-between">
                    <p className="text-sm text-blue-700">{children}</p>
                    <p className="mt-3 text-sm md:mt-0 md:ml-6">
                        {new Date().toDateString()}
                    </p>
                </div>
            </div>
        </div>
    )
}